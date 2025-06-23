<header class="header">
    <div class="header-left">
        <button class="menu-toggle" id="menuToggle">☰</button>
        <h1 class="page-title">Dashboard</h1>
    </div>
    <div class="header-right">
        <div class="search-box">
            <input type="text" class="search-input" placeholder="Search anything...">
            <span class="search-icon">🔍</span>
        </div>
        <div class="header-actions">
            <button class="notification-btn">
                🔔
                <span class="notification-badge"></span>
            </button>
            <div class="user-avatar" id="userAvatar" style="cursor:pointer; position:relative;">
                JD
                <div id="userDropdown" style="display:none; position:absolute; right:0; top:100%; background:#fff; border:1px solid #ccc; border-radius:4px; min-width:120px; box-shadow:0 2px 8px rgba(0,0,0,0.1); z-index:100;">
                    <a href="" style="display:block; padding:8px 16px; color:#333; text-decoration:none;">Profile</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" style="width:100%; text-align:left; padding:8px 16px; border:none; background:none; color:#333; cursor:pointer;">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const avatar = document.getElementById('userAvatar');
        const dropdown = document.getElementById('userDropdown');
        avatar.addEventListener('click', function(e) {
            e.stopPropagation();
            dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
        });
        document.addEventListener('click', function() {
            dropdown.style.display = 'none';
        });
    });
</script>
