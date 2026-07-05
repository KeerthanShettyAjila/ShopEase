<footer class="footer bg-light py-3">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center flex-wrap">
            <!-- Copyright -->
            <div class="copyright">
                <p class="mb-0 text-muted">
                    &copy; <?php echo date('Y'); ?> SHOPEASE. All Rights Reserved.
                </p>
            </div>
            
            <!-- Social Links -->
            <div class="social-links ms-auto">
                <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>
</footer>

<style>
.footer {
    box-shadow: 0 -2px 10px rgba(0,0,0,0.05);
    border-top: 1px solid rgba(0,0,0,0.05);
}

.social-links {
    display: flex;
    gap: 15px;
    margin-left: auto;
}

.social-icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 35px;
    height: 35px;
    border-radius: 50%;
    background: #f8f9fa;
    color: #666;
    transition: all 0.3s ease;
    text-decoration: none;
}

.social-icon:hover {
    background: #007bff;
    color: white;
    transform: translateY(-2px);
}

@media (max-width: 576px) {
    .footer .d-flex {
        flex-direction: column;
        text-align: center;
        gap: 1rem;
    }
    
    .copyright {
        order: 2;
    }
    
    .social-links {
        order: 1;
    }
}
</style>