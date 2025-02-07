<section class="contact fade-in">
    <h2>Contact Us</h2>
    <div class="contact-container">
        <div class="contact-info">
            <h3>Get in Touch</h3>
            <p><strong>Email:</strong> info@jobrecruit.com</p>
            <p><strong>Phone:</strong> +1 (555) 123-4567</p>
            <p><strong>Address:</strong> 123 Recruitment St, Job City, 12345</p>
            <div class="social-media">
                <a href="#" class="social-icon"><i class="fab fa-facebook"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-linkedin"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
        <form id="contact-form" class="contact-form">
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <input type="text" name="subject" placeholder="Subject" required>
            <textarea name="message" placeholder="Your Message" required></textarea>
            <button type="submit" class="btn">Send Message</button>
        </form>
    </div>
    <div id="map" class="map"></div>
    <div id="live-chat" class="live-chat">
        <button id="open-chat" class="btn">Live Chat</button>
        <div id="chat-window" class="chat-window" style="display: none;">
            <div class="chat-header">
                <h4>Live Chat Support</h4>
                <button id="close-chat" class="btn">Close</button>
            </div>
            <div id="chat-messages" class="chat-messages"></div>
            <form id="chat-form" class="chat-form">
                <input type="text" id="chat-input" placeholder="Type your message...">
                <button type="submit" class="btn">Send</button>
            </form>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('contact-form');
    const openChatBtn = document.getElementById('open-chat');
    const closeChatBtn = document.getElementById('close-chat');
    const chatWindow = document.getElementById('chat-window');
    const chatForm = document.getElementById('chat-form');
    const chatInput = document.getElementById('chat-input');
    const chatMessages = document.getElementById('chat-messages');
    
    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        const formData = new FormData(form);
        
        // In a real application, you would send this data to a server
        console.log('Form submitted:', Object.fromEntries(formData));
        
        // Simulating a successful submission
        const successMessage = document.createElement('div');
        successMessage.classList.add('success-message', 'slide-in');
        successMessage.textContent = 'Thank you for your message. We will get back to you soon!';
        form.appendChild(successMessage);
        form.reset();

        setTimeout(() => {
            successMessage.remove();
        }, 5000);
    });

    // Initialize Google Maps
    function initMap() {
        const mapOptions = {
            center: { lat: 40.7128, lng: -74.0060 }, // New York City coordinates
            zoom: 12
        };
        const map = new google.maps.Map(document.getElementById('map'), mapOptions);
        
        const marker = new google.maps.Marker({
            position: { lat: 40.7128, lng: -74.0060 },
            map: map,
            title: 'JobRecruit Office'
        });
    }

    // Call initMap when the Google Maps script is loaded
    window.initMap = initMap;

    // Live Chat functionality
    openChatBtn.addEventListener('click', () => {
        chatWindow.style.display = 'block';
    });

    closeChatBtn.addEventListener('click', () => {
        chatWindow.style.display = 'none';
    });

    chatForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const message = chatInput.value.trim();
        if (message) {
            addMessage('You', message);
            chatInput.value = '';
            // Simulate a response from the support team
            setTimeout(() => {
                addMessage('Support', 'Thank you for your message. How can we assist you today?');
            }, 1000);
        }
    });

    function addMessage(sender, text) {
        const messageElement = document.createElement('div');
        messageElement.classList.add('chat-message');
        messageElement.innerHTML = `<strong>${sender}:</strong> ${text}`;
        chatMessages.appendChild(messageElement);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }
});
</script>

<style>
.contact-container {
    display: flex;
    gap: 2rem;
}

.contact-info, .contact-form {
    flex: 1;
}

.contact-info {
    background-color: var(--primary-color);
    color: white;
    padding: 2rem;
    border-radius: 8px;
}

.social-media {
    margin-top: 1rem;
}

.social-icon {
    color: white;
    font-size: 1.5rem;
    margin-right: 1rem;
    transition: opacity 0.3s;
}

.social-icon:hover {
    opacity: 0.8;
}

.contact-form input,
.contact-form textarea {
    width: 100%;
    padding: 0.5rem;
    margin-bottom: 1rem;
    border: 1px solid var(--border-color);
    border-radius: 4px;
}

.contact-form textarea {
    height: 150px;
}

.success-message {
    background-color: var(--accent-color);
    color: white;
    padding: 1rem;
    border-radius: 4px;
    margin-top: 1rem;
}

.map {
    height: 400px;
    margin-top: 2rem;
    border-radius: 8px;
    overflow: hidden;
}

.live-chat {
    position: fixed;
    bottom: 20px;
    right: 20px;
}

.chat-window {
    position: fixed;
    bottom: 80px;
    right: 20px;
    width: 300px;
    height: 400px;
    background-color: var(--bg-color);
    border: 1px solid var(--border-color);
    border-radius: 8px;
    display: flex;
    flex-direction: column;
}

.chat-header {
    background-color: var(--primary-color);
    color: white;
    padding: 0.5rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.chat-messages {
    flex-grow: 1;
    overflow-y: auto;
    padding: 1rem;
}

.chat-form {
    display: flex;
    padding: 0.5rem;
}

.chat-form input {
    flex-grow: 1;
    margin-right: 0.5rem;
}

@media (max-width: 768px) {
    .contact-container {
        flex-direction: column;
    }
}
</style>

