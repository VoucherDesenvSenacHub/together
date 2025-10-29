// relatorioOng_PDF.js
// Caminho: /together/view/assets/js/pages/relatorioOng_PDF.js

document.addEventListener('DOMContentLoaded', () => {
  const gatilho =
    document.querySelector('#btn-relatorio-pdf') ||
    document.querySelector('.relatorio-ong-default-icon-div');

  if (!gatilho) {
    console.warn('Botão de relatório PDF não encontrado.');
    return;
  }

  gatilho.addEventListener('click', async (event) => {
    event.preventDefault();

    try {
      await ensureHtml2Pdf();

      // Filtros da tela
      const dtInicioStr = document.querySelector('#data-inicio')?.value || '';
      const dtFinalStr  = document.querySelector('#data-final')?.value || '';
      const pesquisar   = document.querySelector('#pesquisar')?.value?.trim() || '';

      const periodo = `${formatDateBR(dtInicioStr) || '--/--/----'} a ${formatDateBR(dtFinalStr) || '--/--/----'}`;
      const paginaAtual = new URLSearchParams(location.search).get('pagina') || '1';

      // Coleta linhas da página atual
      const linhas = Array.from(document.querySelectorAll('.tabela tbody tr'));
      const semResultados = linhas.length === 0 || (linhas.length === 1 && linhas[0].textContent.toLowerCase().includes('nenhuma doação'));
      const dados = [];
      let totalPagina = 0;

      if (!semResultados) {
        linhas.forEach(tr => {
          const tds = tr.querySelectorAll('td');
          if (tds.length >= 3) {
            const data   = (tds[0].textContent || '').trim();
            const doador = (tds[1].textContent || '').trim();
            const valor  = (tds[2].textContent || '').trim(); // "R$ 1.234,56"
            const vNum   = parseBRL(valor);
            if (isFinite(vNum)) totalPagina += vNum;
            dados.push({ data, doador, valor });
          }
        });
      }

      const agora = new Date();
      const dataHoraBR = agora.toLocaleString('pt-BR');
      const stamp = agora.toISOString().slice(0, 19).replace(/[:T]/g, '-');

      // Ajuste conforme sua pasta de imagens
      const logoPath = '/together/view/assets/images/Geral/Together.png';

      const container = document.createElement('div');
      // A4 = 210mm x 297mm. Usamos 190mm + padding 10mm = 210mm, sem margem do html2pdf (margin:0).
      container.style.width = '190mm';
      container.style.boxSizing = 'border-box';
      container.style.padding = '10mm';
      container.style.fontFamily = 'Arial, sans-serif';
      container.style.color = '#222';

      container.innerHTML = `
        <style>
          .rlt-header { text-align: center; margin-bottom: 8mm; }
          .rlt-header h1 { margin: 6px 0 0 0; font-size: 18px; }
          .rlt-meta { font-size: 12px; color: #555; }

          .rlt-filtros { font-size: 12px; margin: 6px 0 10px; }
          .rlt-filtros div { margin: 2px 0; }

          .rlt-tabela { width: 100%; border-collapse: collapse; font-size: 12px; table-layout: auto; }
          .rlt-tabela thead { display: table-header-group; }
          .rlt-tabela tfoot { display: table-row-group; }
          .rlt-tabela th, .rlt-tabela td {
            border: 1px solid #ccc;
            padding: 6px 8px;
            line-height: 1.25;
            white-space: normal;   /* garante quebra quando preciso */
            overflow: visible;     /* evita corte visual */
            word-break: break-word;
          }
          .rlt-tabela th { background: #f4f6f8; text-align: left; }
          .rlt-tabela td.valor, .rlt-tabela th.valor {
            text-align: right;
            white-space: nowrap;           /* mantém "R$ 1.234,56" na mesma linha */
            font-variant-numeric: tabular-nums;
          }

          .rlt-rodape { margin-top: 6mm; font-size: 11px; color:#777; }
        </style>

        <div class="rlt-header">
          <img src="${logoPath}" alt="Logo" style="height:42px; object-fit:contain; margin-bottom: 6px;">
          <h1>Relatório de Doações</h1>
          <div class="rlt-meta">Gerado em ${dataHoraBR}</div>
        </div>

        <div class="rlt-filtros">
          <div><strong>Período:</strong> ${escapeHtml(periodo)}</div>
          ${pesquisar ? `<div><strong>Filtro (Doador):</strong> ${escapeHtml(pesquisar)}</div>` : ''}
          <div><strong>Página:</strong> ${escapeHtml(String(paginaAtual))}</div>
        </div>

        <table class="rlt-tabela">
          <colgroup>
            <col style="width:22%;">
            <col style="width:54%;">
            <col style="width:24%;">
          </colgroup>
          <thead>
            <tr>
              <th>Data</th>
              <th>Doador</th>
              <th class="valor">Valor</th>
            </tr>
          </thead>
          <tbody>
            ${
              dados.length
                ? dados.map(r => `
                    <tr>
                      <td>${escapeHtml(r.data)}</td>
                      <td>${escapeHtml(r.doador)}</td>
                      <td class="valor">${escapeHtml(r.valor)}</td>
                    </tr>
                  `).join('')
                : `
                  <tr>
                    <td colspan="3" style="text-align:center; color:#666; padding:12px;">
                      Nenhuma doação encontrada.
                    </td>
                  </tr>
                `
            }
          </tbody>
          <tfoot>
            <tr>
              <td colspan="2" style="text-align:right;"><strong>Total desta página</strong></td>
              <td class="valor"><strong>${formatBRL(totalPagina)}</strong></td>
            </tr>
            <tr>
              <td colspan="2" style="text-align:right;">Registros nesta página</td>
              <td class="valor">${dados.length}</td>
            </tr>
          </tfoot>
        </table>

        <div class="rlt-rodape">
          Este relatório reflete os dados atualmente visíveis na página (após filtros e paginação).
        </div>
      `;

      const opts = {
        margin: 0, // usamos o padding do container como margem
        filename: `relatorio-doacoes-${stamp}.pdf`,
        html2canvas: { scale: 2, useCORS: true },
        jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
      };

      window.html2pdf().set(opts).from(container).save();
    } catch (err) {
      console.error('Falha ao gerar PDF:', err);
      alert('Não foi possível gerar o PDF do relatório.');
    }
  });
});

/* Utils */
function ensureHtml2Pdf() {
  if (window.html2pdf) return Promise.resolve();
  return new Promise((resolve, reject) => {
    const s = document.createElement('script');
    s.src = 'https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js';
    s.onload = () => resolve();
    s.onerror = () => reject(new Error('Erro ao carregar html2pdf.js'));
    document.head.appendChild(s);
  });
}

function formatDateBR(dateISO) {
  if (!dateISO) return '';
  const [y, m, d] = dateISO.split('-');
  if (!y || !m || !d) return dateISO;
  return `${d}/${m}/${y}`;
}

function parseBRL(texto) {
  if (!texto) return 0;
  let s = String(texto).replace(/[^\d.,-]/g, '').trim();
  s = s.replace(/\./g, '').replace(',', '.');
  const n = Number(s);
  return isFinite(n) ? n : 0;
}

function formatBRL(valor) {
  try {
    return valor.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
  } catch {
    return `R$ ${Number(valor).toFixed(2).replace('.', ',')}`;
  }
}

function escapeHtml(str) {
  return String(str ?? '')
    .replaceAll('&', '&amp;')
    .replaceAll('<', '&lt;')
    .replaceAll('>', '&gt;')
    .replaceAll('"', '&quot;')
    .replaceAll("'", '&#39;');
}