<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Roles CRUD</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6 bg-gray-100">
<div class="max-w-xl mx-auto bg-white p-4 shadow rounded">
    <h1 class="text-xl font-bold mb-4">Roles</h1>

    <button onclick="openAddModal()"
            class="bg-blue-500 text-white px-4 py-2 rounded mb-4">
        + Tambah Role
    </button>

    <!-- List -->
    <ul id="roleList" class="space-y-2"></ul>
</div>

<!-- 🔹 Modal -->
<div id="roleModal"
     class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-lg w-96 p-6">
        <h2 id="modalTitle" class="text-lg font-bold mb-4">Tambah Role</h2>

        <form id="roleForm" class="space-y-4">
            <input type="hidden" id="roleId">
            <input type="text" id="roleName"
                   class="border rounded w-full p-2"
                   placeholder="Nama Role">
            <div class="flex justify-end gap-2">
                <button type="button" onclick="closeModal()"
                        class="px-3 py-2 rounded bg-gray-300">Batal</button>
                <button type="submit"
                        class="px-3 py-2 rounded bg-blue-500 text-white">Simpan</button>
            </div>
        </form>
    </div>
</div>

<script>
    async function fetchRoles() {
        let res = await fetch("{{ route('roles.list') }}");
        let data = await res.json();
        let list = document.getElementById('roleList');
        list.innerHTML = '';
        data.forEach(r => {
            list.innerHTML += `
                <li class="flex justify-between items-center p-2 bg-gray-200 rounded">
                    <span>${r.name}</span>
                    <div class="flex gap-2">
                        <button onclick="openEditModal(${r.id}, '${r.name}')"
                                class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</button>
                        <button onclick="deleteRole(${r.id})"
                                class="bg-red-500 text-white px-2 py-1 rounded">Hapus</button>
                    </div>
                </li>`;
        });
    }

    function openAddModal() {
        document.getElementById('roleId').value = '';
        document.getElementById('roleName').value = '';
        document.getElementById('modalTitle').textContent = "Tambah Role";
        document.getElementById('roleModal').classList.remove('hidden');
    }

    function openEditModal(id, name) {
        document.getElementById('roleId').value = id;
        document.getElementById('roleName').value = name;
        document.getElementById('modalTitle').textContent = "Edit Role";
        document.getElementById('roleModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('roleModal').classList.add('hidden');
    }

    document.getElementById('roleForm').addEventListener('submit', async e => {
        e.preventDefault();
        let id = document.getElementById('roleId').value;
        let name = document.getElementById('roleName').value;

        let url = id ? `/roles/${id}` : `/roles`;
        let method = id ? "PUT" : "POST";

        let res = await fetch(url, {
            method: method,
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({ name })
        });

        if (res.ok) {
            closeModal();
            fetchRoles();
        }
    });

    async function deleteRole(id) {
        if (!confirm("Yakin hapus role?")) return;

        let res = await fetch(`/roles/${id}`, {
            method: "DELETE",
            headers: { "X-CSRF-TOKEN": "{{ csrf_token() }}" }
        });

        if (res.ok) {
            fetchRoles();
        }
    }

    fetchRoles();
</script>
</body>
</html>
