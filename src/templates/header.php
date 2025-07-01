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
                    class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50 hidden">
                    <div class="bg-white rounded-lg shadow-lg p-6 max-w-sm w-full">
                        <h3 class="text-lg font-semibold mb-4">Konfirmasi Logout</h3>
                        <p class="mb-6 text-gray-700">Apakah kamu yakin ingin keluar dari akun?</p>
                        <form action="/logout" method="POST" class="flex justify-end space-x-3">
                            <button type="button" onclick="toggleModal(false)"
                                class="px-4 py-2 rounded bg-gray-200 hover:bg-gray-300 text-gray-700">Batal</button>
                            <button type="submit"
                                class="px-4 py-2 rounded bg-red-500 hover:bg-red-600 text-white">Logout</button>
                        </form>
                    </div>
                </div>

                <script>
                    const modalLogout = document.getElementById('logoutModal');
                    const modalLogoutContent = document.getElementById('logoutModalContent');

                    function toggleModal(show) {
                        if (show) {
                            modalLogout.classList.remove('hidden');
                            modalLogout.classList.add('flex');
                        } else {
                            modalLogout.classList.remove('flex');
                            modalLogout.classList.add('hidden');
                        }
                    }

                    window.addEventListener('click', function (e) {
                        if (e.target === modalLogout) {
                            toggleModal(false);
                        }
                    });
                </script>
            <?php } ?>
        </nav>
    </div>
</header>