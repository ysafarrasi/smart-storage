    <footer class="text-center py-3" style="background-color: white;">
            <!-- Copyright -->
            <div class="container d-flex justify-content-between align-items-center">
                <img src="assets/img/stas-rg_logo-removebg-preview.png" alt="Logo" width="150px" class="me-3" href="#">
                <div class="d-flex gap-3 align-items-center">
                    <!-- Link Youtube STAS RG -->
                    <a href="https://www.youtube.com/@stas_rg" target="_blank" rel="noopener noreferrer" style="transition: all 0.2s ease-in-out; animation: spin 10s linear infinite;">
                        <img src="assets/img/youtube.png" alt="Logo Youtube" width="50px">
                    </a>
                    <!-- Link Instagram STAS RG -->
                    <a href="https://www.instagram.com/stas.rg/" target="_blank" rel="noopener noreferrer" style="transition: all 0.2s ease-in-out; animation: spin 10s linear infinite;">
                        <img src="assets/img/instagram.png" alt="Logo Instagram" width="50px">
                    </a>
                    <!-- Link Link Website STAS RG -->
                    <a href="https://tuvv.telkomuniversity.ac.id/stas-rg/" target="_blank" rel="noopener noreferrer" style="transition: all 0.2s ease-in-out; animation: spin 10s linear infinite;">
                        <img src="assets/img/links.png" alt="Logo Link" width="50px">
                    </a>
                </div>
                <style>
                    @keyframes spin {
                        0% {
                            transform: rotate(deg);
                        }
                        100% {
                            transform: rotate(1000deg);
                        }
                    }
                </style>
                
                <div class="text-end">
                    <div class="mb-3"></div>
                    <button type="button" class="btn btn-success rounded-pill" style="transition: all 0.2s ease-in-out;" onmouseover="this.style.backgroundColor='#198754'; this.style.color='white'" onmouseout="this.style.backgroundColor='#ffffff'; this.style.color='#198754'">
                        <img src="assets/img/Logo G - STAS RG.png" alt="Logo STAS RG" width="25px" class="me-2"> 2024 Stas-RG
                    </button>
                    <div class="mb-3"></div>
                    <a href="{{ route('help') }}" class="btn btn-primary rounded-pill">
                        <i class="bi bi-question-circle me-2"></i>{{ __('users.Butuh Bantuan') }}
                    </a>
                    @auth
                    <div class="mb-3"></div>
                    <a href="{{ route('daftaradmin.index') }}" class="btn btn-outline-success rounded-pill d-none d-md" role="button">
                    <i class="bi bi-person-circle me-2"></i>Admin
                    </a>
                    
                    </button>
                    @endauth                
                </div>
            </div>
            <!-- Copyright -->
        </footer>

