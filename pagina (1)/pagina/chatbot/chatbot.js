// Ejemplo mínimo del flujo de ayuda (integrar en tu chatbot existente)
let chatbotState = 'inicio';
let helpData = {};

function iniciarChat() {
    const messages = document.getElementById('chatbot-messages');
    messages.innerHTML = '<div class="bot-message"><p>👋 Hola — ¿En qué puedo ayudarte?<br>3) soporte</p></div>';
}

function sendMessage() {
    const input = document.getElementById('user-input');
    const text = input.value.trim();
    if (!text) return;
    appendUser(text);
    input.value = '';

    if (chatbotState === 'inicio') {
        if (text === '3') {
            chatbotState = 'ayuda_nombre';
            appendBot('🧾 Perfecto. Dime tu nombre completo:');
            return;
        }
        // ... otras opciones ...
        appendBot('Escribe 1, 2 o 3');
        return;
    }

    if (chatbotState === 'ayuda_nombre') {
        helpData.nombre = text;
        chatbotState = 'ayuda_correo';
        appendBot('✉️ Ahora escribe tu correo de contacto:');
        return;
    }

    if (chatbotState === 'ayuda_correo') {
        helpData.correo = text;
        chatbotState = 'ayuda_mensaje';
        appendBot('📝 Describe brevemente tu problema:');
        return;
    }

    if (chatbotState === 'ayuda_mensaje') {
        helpData.mensaje = text;
        chatbotState = 'inicio'; // volver al inicio después de enviar
        appendBot('🕐 Generando ticket y PDF... un momento por favor.');

        // Enviar al backend
        const body = new URLSearchParams();
        body.append('nombre', helpData.nombre);
        body.append('correo', helpData.correo);
        body.append('mensaje', helpData.mensaje);

        fetch('chatbot/chatbot_enviar_ticket.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: body.toString()
        })
        .then(resp => resp.json().catch(()=>{ throw new Error('Respuesta no JSON'); }))
        .then(data => {
            if (data.status === 'success') {
                appendBot(data.message + (data.pdf ? `<br>📄 PDF: <a href="tickets/${data.pdf}" target="_blank">Abrir</a>` : ''));
            } else {
                appendBot('❌ Ocurrió un error: ' + (data.message || 'Sin detalles'));
            }
        })
        .catch(err => {
            appendBot('⚠️ Error al conectar con el servidor: ' + err.message);
        });

        return;
    }
}

function appendUser(text) {
    const messages = document.getElementById('chatbot-messages');
    messages.innerHTML += `<div class="user-message"><p>${escapeHtml(text)}</p></div>`;
    messages.scrollTop = messages.scrollHeight;
}

function appendBot(text) {
  const messages = document.getElementById('chatbot-messages');
  const formatted = text.replace(/\n/g, '<br>');
  messages.innerHTML += `<div class="bot-message"><p>${formatted}</p></div>`;
  messages.scrollTop = messages.scrollHeight;
}

function escapeHtml(unsafe) {
    return unsafe.replace(/[&<"'>]/g, function(m){ return ({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#039;'}[m]); });
}

// init
window.addEventListener('load', iniciarChat);
