<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>


    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg p-6">

                <div class="flex items-center gap-6 mb-6">
                    <img src="/images/profile1.avif"
                         class="h-20 w-20 rounded-full"
                         alt="Profile picture">
                    <div>
                        <h2 class="text-xl font-semibold"><?= htmlspecialchars($_SESSION['user']['email']) ?></h2>
                        <p class="text-gray-500 text-sm">Member</p>
                    </div>
                </div>

                <hr class="mb-6">

                <form method="POST" action="/profile/edit">
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                        <input type="text"
                               name="name"
                               value="<?= htmlspecialchars($_SESSION['user']['name'] ?? '') ?>"
                               class="w-full rounded-md border border-gray-300 py-2 px-3 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email"
                               name="email"
                               value="<?= htmlspecialchars($_SESSION['user']['email'] ?? '') ?>"
                               class="w-full rounded-md border border-gray-300 py-2 px-3 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>

                    <button type="submit"
                            class="rounded-md bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Save
                    </button>
                </form>

            </div>
        </div>
    </main>


<?php require base_path('views/partials/footer.php') ?>