<header class="bg-white shadow-md border-b border-gray-200 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 py-4 flex items-center justify-between">
        <a href="/" class="text-xl font-bold text-blue-600">🧠 DiagnosaPakar</a>
        <nav class="space-x-4 hidden sm:block">
            <a href="/" class="text-gray-700 hover:text-blue-600 font-medium transition">Beranda</a>
            <a href="/dashboard" class="text-gray-700 hover:text-blue-600 font-medium transition">Dashboard</a>
            <a href="/tentang" class="text-gray-700 hover:text-blue-600 font-medium transition">Tentang</a>

            <?php if (!isset($_SESSION['user'])) { ?>
                <a href="/login" class="text-gray-700 hover:text-blue-600 font-medium transition">Login</a>
            <?php } else { ?>
                <button type="button" onclick="toggleModal(true)"
                    class="text-gray-700 hover:text-blue-600 font-medium transition">
                    Logout
                </button>

                <!-- Modal Logout -->
                <div id="logoutModal"
                    class="fixed inset-0 z-50 hidden items-center justify-center">
                    <div id="logoutModalContent"
                        class="bg-white rounded-lg shadow-xl p-6 w-full max-w-sm animate-fade-in relative">
                        <h2 class="text-lg font-semibold mb-3">Konfirmasi Logout</h2>
                        <p class="text-gray-600 mb-6">Apakah kamu yakin ingin keluar dari akun?</p>
                        <div class="flex justify-end space-x-3">
                            <button onclick="toggleModal(false)"
                                class="px-4 py-2 rounded bg-gray-100 hover:bg-gray-200 text-gray-800">
                                Batal
                            </button>
                            <form action="/logout" method="POST" class="inline">
                                <button type="submit" class="px-4 py-2 rounded bg-red-600 hover:bg-red-700 text-white">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <script>
                    const modal = document.getElementById('logoutModal');
                    const modalContent = document.getElementById('logoutModalContent');

                    function toggleModal(show) {
                        if (show) {
                            modal.classList.remove('hidden');
                            modal.classList.add('flex');
                        } else {
                            modal.classList.remove('flex');
                            modal.classList.add('hidden');
                        }
                    }

                    window.addEventListener('click', function (e) {
                        if (e.target === modal) {
                            toggleModal(false);
                        }
                    });
                </script>
            <?php } ?>
        </nav>
    </div>
</header>