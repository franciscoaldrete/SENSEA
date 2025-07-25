<?php
// Detectar la ruta base según desde dónde se llama el footer
$current_script = $_SERVER['SCRIPT_NAME'];
$is_from_admin = strpos($current_script, 'admin.php') !== false;
$base_path = $is_from_admin ? '' : '../';
?>
    <footer style="background: linear-gradient(90deg, #8e24aa 0%, #d81b60 100%); color: #fff; margin-top: 3rem;">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-5 mb-4 mb-md-0">
                    <h4 class="fw-bold mb-3 text-white"><i class="fas fa-chart-line me-2"></i>SENSEA</h4>
                    <p class="text-white" style="font-size:1.05em;">
                        Proyecto "Competitividad Regional de Chihuahua e Inserción en el Comercio Internacional" desarrollado por la <strong>Universidad Autónoma de Chihuahua UACH</strong> en colaboración con <strong>University of Utah, University of Texas at El Paso y Plataforma de Inteligencia Competitiva del Sector Privado (PICsp) Chihuahua</strong>.
                    </p>
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <h5 class="fw-bold mb-3 text-white">Enlaces Rápidos</h5>
                    <ul class="list-unstyled">
                        <li><a href="<?= $base_path ?>index.html#vision" class="text-white text-decoration-none">Visión</a></li>
                        <li><a href="<?= $base_path ?>index.html#metodologia" class="text-white text-decoration-none">Metodología</a></li>
                        <li><a href="<?= $base_path ?>index.html#indicadores" class="text-white text-decoration-none">Indicadores</a></li>
                        <li><a href="<?= $base_path ?>index.html#etapas" class="text-white text-decoration-none">Etapas</a></li>
                        <li><a href="<?= $base_path ?>index.html#equipo" class="text-white text-decoration-none">Equipo</a></li>
                        <li><a href="<?= $base_path ?>pages/colaboradores.html" class="text-white text-decoration-none">Colaboradores</a></li>
                        <li><a href="<?= $base_path ?>index.html#resultados" class="text-white text-decoration-none">Resultados</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5 class="fw-bold mb-3 text-white">Síguenos</h5>
                    <div class="d-flex gap-3">
                        <a href="#" class="d-inline-block" style="background:#e53935; border-radius:50%; width:40px; height:40px; display:flex; align-items:center; justify-content:center;"><i class="fab fa-twitter text-white"></i></a>
                        <a href="#" class="d-inline-block" style="background:#e53935; border-radius:50%; width:40px; height:40px; display:flex; align-items:center; justify-content:center;"><i class="fab fa-linkedin-in text-white"></i></a>
                        <a href="#" class="d-inline-block" style="background:#e53935; border-radius:50%; width:40px; height:40px; display:flex; align-items:center; justify-content:center;"><i class="fab fa-facebook-f text-white"></i></a>
                        <a href="#" class="d-inline-block" style="background:#e53935; border-radius:50%; width:40px; height:40px; display:flex; align-items:center; justify-content:center;"><i class="fab fa-instagram text-white"></i></a>
                    </div>
                </div>
            </div>
            <hr style="border-color:rgba(255,255,255,0.2); margin:2rem 0 1rem 0;">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start mb-2 mb-md-0">
                    <small class="text-white">© <?= date('Y') ?> SENSEA Chihuahua. Todos los derechos reservados.</small>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <small class="text-white">Desarrollado con <span style="color:#e53935;">❤️</span> para Chihuahua | 🏛️ FCA - UACH</small>
                </div>
            </div>
        </div>
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </footer>
</body>
</html> 