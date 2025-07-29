<?php
// Detectar la ruta base según desde dónde se llama el footer
$current_script = $_SERVER['SCRIPT_NAME'];
$is_from_admin = strpos($current_script, 'admin.php') !== false;
$base_path = $is_from_admin ? '' : '../';
?>
    <!-- Footer -->
    <footer class="footer-dark">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <h5><i class="fas fa-chart-line me-2"></i>SENSEA</h5>
                    <p>Proyecto "Competitividad Regional de Chihuahua e Inserción en el Comercio Internacional" desarrollado por la <strong>Universidad Autónoma de Chihuahua UACH</strong> en colaboración con <strong>University of Utah</strong>, <strong>University of Texas at El Paso</strong> y <strong>Plataforma de Inteligencia Competitiva del Sector Privado (PICsp) Chihuahua</strong>.</p>
                </div>
                <div class="col-lg-4">
                    <h5>Enlaces Rápidos</h5>
                    <ul class="footer-links">
                        <li><a href="<?= $base_path ?>index.html#vision">Visión</a></li>
                        <li><a href="<?= $base_path ?>index.html#metodologia">Metodología</a></li>
                        <li><a href="<?= $base_path ?>index.html#indicadores">Indicadores</a></li>
                        <li><a href="<?= $base_path ?>index.html#etapas">Etapas</a></li>
                        <li><a href="<?= $base_path ?>index.html#equipo">Equipo</a></li>
                        <li><a href="<?= $base_path ?>pages/colaboradores.html">Colaboradores</a></li>
                        <li><a href="<?= $base_path ?>index.html#resultados">Resultados</a></li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <h5>Síguenos</h5>
                    <div class="social-links">
                        <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-linkedin"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <hr class="footer-divider">
            <div class="row">
                <div class="col-md-6">
                    <p class="mb-0">&copy; <?= date('Y') ?> SENSEA Chihuahua. Todos los derechos reservados.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="mb-0">Desarrollado con <i class="fas fa-heart text-danger"></i> para Chihuahua | <i class="fas fa-university text-warning"></i> FCA - UACH | 
                    <span style="font-size: 0.7em; opacity: 0.7;" data-bs-toggle="tooltip" data-bs-placement="top" title="Francisco Aldrete">web design</span></p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
    // Inicializar tooltips
    document.addEventListener('DOMContentLoaded', function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
    </script>
</body>
</html> 