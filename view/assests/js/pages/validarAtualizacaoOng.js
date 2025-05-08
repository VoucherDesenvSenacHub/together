document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.fa-eye').forEach(function (eyeIcon) {
      eyeIcon.addEventListener('click', function (e) {
        e.preventDefault();
        const modal = document.getElementById('modal');

        // Simulação dos dados da ONG (em um cenário real, você pode buscar via AJAX/PHP)
        const info = {
          nome: "ONG Cachorrinho",
          cnpj: "12.345.678/0001-90",
          fundacao: "15/03/2010",
          telefone: "(11) 98765-4321",
          endereco: "Rua Exemplo, 123 - São Paulo - SP",
          conselho: "Sim",
          tipo: "Proteção Animal",
          logo: "https://via.placeholder.com/150", // Substitua pelo caminho real da logo
          email: "contato@ongcachorrinho.org"
        };

        document.getElementById('modal-info').innerHTML = `
          <div><strong>Nome:</strong> ${info.nome}</div>
          <div><strong>CNPJ:</strong> ${info.cnpj}</div>
          <div class="full-width"><strong>Data de Fundação:</strong> ${info.fundacao}</div>
          <div class="full-width"><strong>Telefone:</strong> ${info.telefone}</div>
          <div class="full-width"><strong>Endereço:</strong> ${info.endereco}</div>
          <div><strong>Conselho Fiscal:</strong> ${info.conselho}</div>
          <div><strong>Tipo da ONG:</strong> ${info.tipo}</div>
          <div class="logo"><img src="${info.logo}" alt="Logo da ONG"></div>
          <div class="full-width"><strong>Email:</strong> ${info.email}</div>
        `;

        modal.style.display = 'flex';
      });
    });

    // Fechar o modal ao clicar no botão de fechar
    document.querySelector('.close-btn').addEventListener('click', function () {
      document.getElementById('modal').style.display = 'none';
    });

    // Fechar o modal ao clicar fora do conteúdo
    window.addEventListener('click', function (event) {
      const modal = document.getElementById('modal');
      if (event.target === modal) {
        modal.style.display = 'none';
      }
    });

    // Adicionando funcionalidades para os botões de Aceitar e Rejeitar
    document.getElementById('aceitar-btn').addEventListener('click', function () {
      alert('ONG Aceita!');
      document.getElementById('modal').style.display = 'none';
    });

    document.getElementById('rejeitar-btn').addEventListener('click', function () {
      alert('ONG Rejeitada!');
      document.getElementById('modal').style.display = 'none';
    });
});
