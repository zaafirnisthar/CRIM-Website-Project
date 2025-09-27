<!-- Footer -->
<footer style="background-color:#1b1f2a; color:#f0f0f0; padding:60px 20px; border-top:2px solid #d4af37; font-family: 'Inter', sans-serif;">
    <div style="max-width:1400px; margin:0 auto; display:grid; grid-template-columns:repeat(auto-fit,minmax(250px,1fr)); gap:40px; align-items:start;">

        <!-- Contact Info -->
        <div>
            <h4 style="color:#d4af37; font-size:1.3rem; font-weight:700; margin-bottom:20px;">Contact Us</h4>
            <p><i class="fas fa-map-marker-alt" style="margin-right:8px; color:#d4af37;"></i>Jalan Tun Abdul Razak, 05200 Alor Setar, Kedah</p>
            <p><i class="fas fa-envelope" style="margin-right:8px; color:#d4af37;"></i><a href="mailto:contact@aiu.edu.my" style="color:#f0f0f0; text-decoration:underline;">contact@aiu.edu.my</a></p>
            <p><i class="fas fa-phone" style="margin-right:8px; color:#d4af37;"></i>+604-747-4000</p>
        </div>

        <!-- Quick Links -->
        <div>
            <h4 style="color:#d4af37; font-size:1.3rem; font-weight:700; margin-bottom:20px;">Quick Links</h4>
            <ul style="list-style:none; padding:0; line-height:2;">
                <li><a href="index.php" style="color:#f0f0f0; text-decoration:none;">Home</a></li>
                <li><a href="#" style="color:#f0f0f0; text-decoration:none;">About Us</a></li>
                <li><a href="#" style="color:#f0f0f0; text-decoration:none;">Research Area</a></li>
                <li><a href="#" style="color:#f0f0f0; text-decoration:none;">Publication</a></li>
                <li><a href="#" style="color:#f0f0f0; text-decoration:none;">Innovation & Impact</a></li>
                <li><a href="#" style="color:#f0f0f0; text-decoration:none;">Opportunities</a></li>
            </ul>
        </div>

        <!-- Social Media -->
        <div>
            <h4 style="color:#d4af37; font-size:1.3rem; font-weight:700; margin-bottom:20px;">Follow Us</h4>
            <div style="display:flex; gap:15px; font-size:1.5rem;">
                <a href="https://www.facebook.com/" target="_blank" style="color:#f0f0f0; transition:0.3s;"><i class="fab fa-facebook-f"></i></a>
                <a href="https://twitter.com/" target="_blank" style="color:#f0f0f0; transition:0.3s;"><i class="fab fa-twitter"></i></a>
                <a href="https://www.instagram.com/" target="_blank" style="color:#f0f0f0; transition:0.3s;"><i class="fab fa-instagram"></i></a>
                <a href="https://www.youtube.com/" target="_blank" style="color:#f0f0f0; transition:0.3s;"><i class="fab fa-youtube"></i></a>
            </div>
        </div>

        <!-- Map -->
        <div style="text-align:center;">
            <h4 style="color:#d4af37; font-size:1.3rem; font-weight:700; margin-bottom:20px;">Our Location</h4>
            <div style="position:relative; width:220px; height:150px; margin:0 auto; border-radius:12px; overflow:hidden; border:1px solid #d4af37;">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3967.625695333583!2d100.38042457500588!3d6.138865493867006!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x304c5a939103e5c9%3A0x6b6e4e5b3f115993!2sAlbukhary%20International%20University!5e0!3m2!1sen!2smy!4v1691234567890!5m2!1sen!2smy"
                        style="width:100%; height:100%; border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>

    <div style="text-align:center; margin-top:40px; font-size:0.9rem; color:#aaa;">
        &copy; <span id="currentYear"></span> CRIM. All Rights Reserved. | Designed by ZAP Syndicate
    </div>
</footer>

<script>
document.getElementById('currentYear').textContent = new Date().getFullYear();

// Social icon hover effect
const socialIcons = document.querySelectorAll('footer a');
socialIcons.forEach(icon => {
    icon.addEventListener('mouseenter', () => icon.style.color = '#d4af37');
    icon.addEventListener('mouseleave', () => icon.style.color = '#f0f0f0');
});
</script>
