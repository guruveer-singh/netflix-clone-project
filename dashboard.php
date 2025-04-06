<?php
session_start();
require_once "database.php";

// Debug: Print session data
//error_log("Dashboard.php - Session data:");
//error_log("user_id: " . (isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 'not set'));
//error_log("email: " . (isset($_SESSION['email']) ? $_SESSION['email'] : 'not set'));
//error_log("first_name: " . (isset($_SESSION['first_name']) ? $_SESSION['first_name'] : 'not set'));

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    error_log("User not logged in, redirecting to signin.html");
    header("Location: signin.html");
    exit();
}

// Get user info
$first_name = $_SESSION['first_name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Netflix Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <header class="main-header">
        <nav>
            <div class="nav-left">
                <img src="580b57fcd9996e24bc43c529.webp" alt="Netflix" class="logo">
                <ul>
                    <li><a href="#" class="active">Home</a></li>
                    <li><a href="#">TV Shows</a></li>
                    <li><a href="#">Movies</a></li>
                    <li><a href="#">New & Popular</a></li>
                    <li><a href="#">My List</a></li>
                </ul>
            </div>
            <div class="nav-right">
                <div class="profile-section">
                    <span class="welcome-text">Welcome, <?php echo htmlspecialchars($first_name); ?></span>
                    <img src="images/profile-icon.png" alt="Profile" class="profile-icon">
                    <div class="profile-menu">
                        <ul>
                            <li><a href="account.php">Account</a></li>
                            <li><a href="logout.php">Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <section class="featured">
            <div class="featured-content">
                <h1>Stranger Things</h1>
                <p>When a young boy vanishes, a small town uncovers a mystery involving secret experiments, terrifying supernatural forces and one strange little girl.</p>
                <div class="buttons">
                    <button class="play-btn">▶ Play</button>
                    <button class="more-info-btn">ℹ More Info</button>
                </div>
            </div>
        </section>

        <section class="movies-row">
            <h2>Trending Now</h2>
            <div class="movies-slider">
                <div class="movie-item">
                    <img src="movies/avatar.jpg" alt="Avatar" />
                    <div class="hover-info">
                        <div class="controls">
                            <button>▶</button>
                            <button>+</button>
                            <button>👍</button>
                        </div>
                        <h3>Avatar</h3>
                        <p>98% Match</p>
                    </div>
                </div>
                <div class="movie-item">
                    <img src="movies/shawshank.jpg" alt="The Shawshank Redemption" />
                    <div class="hover-info">
                        <div class="controls">
                            <button>▶</button>
                            <button>+</button>
                            <button>👍</button>
                        </div>
                        <h3>The Shawshank Redemption</h3>
                        <p>95% Match</p>
                    </div>
                </div>
                <div class="movie-item">
                    <img src="movies/inception.jpg" alt="Inception" />
                    <div class="hover-info">
                        <div class="controls">
                            <button>▶</button>
                            <button>+</button>
                            <button>👍</button>
                        </div>
                        <h3>Inception</h3>
                        <p>96% Match</p>
                    </div>
                </div>
                <div class="movie-item">
                    <img src="movies/godfather.jpg" alt="The Godfather" />
                    <div class="hover-info">
                        <div class="controls">
                            <button>▶</button>
                            <button>+</button>
                            <button>👍</button>
                        </div>
                        <h3>The Godfather</h3>
                        <p>97% Match</p>
                    </div>
                </div>
                <div class="movie-item">
                    <img src="movies/dark-knight.jpg" alt="The Dark Knight" />
                    <div class="hover-info">
                        <div class="controls">
                            <button>▶</button>
                            <button>+</button>
                            <button>👍</button>
                        </div>
                        <h3>The Dark Knight</h3>
                        <p>94% Match</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="movies-row">
            <h2>Popular on Netflix</h2>
            <div class="movies-slider">
                <div class="movie-item">
                    <img src="movies/matrix.jpg" alt="The Matrix" />
                    <div class="hover-info">
                        <div class="controls">
                            <button>▶</button>
                            <button>+</button>
                            <button>👍</button>
                        </div>
                        <h3>The Matrix</h3>
                        <p>93% Match</p>
                    </div>
                </div>
                <div class="movie-item">
                    <img src="movies/fight-club.jpg" alt="Fight Club" />
                    <div class="hover-info">
                        <div class="controls">
                            <button>▶</button>
                            <button>+</button>
                            <button>👍</button>
                        </div>
                        <h3>Fight Club</h3>
                        <p>92% Match</p>
                    </div>
                </div>
                <div class="movie-item">
                    <img src="movies/lotr.jpg" alt="The Lord of the Rings" />
                    <div class="hover-info">
                        <div class="controls">
                            <button>▶</button>
                            <button>+</button>
                            <button>👍</button>
                        </div>
                        <h3>The Lord of the Rings</h3>
                        <p>95% Match</p>
                    </div>
                </div>
                <div class="movie-item">
                    <img src="movies/pulp-fiction.jpg" alt="Pulp Fiction" />
                    <div class="hover-info">
                        <div class="controls">
                            <button>▶</button>
                            <button>+</button>
                            <button>👍</button>
                        </div>
                        <h3>Pulp Fiction</h3>
                        <p>94% Match</p>
                    </div>
                </div>
                <div class="movie-item">
                    <img src="movies/parasite.jpg" alt="Parasite" />
                    <div class="hover-info">
                        <div class="controls">
                            <button>▶</button>
                            <button>+</button>
                            <button>👍</button>
                        </div>
                        <h3>Parasite</h3>
                        <p>96% Match</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script>
        // Add hover effect for movie items
        document.querySelectorAll('.movie-item').forEach(item => {
            item.addEventListener('mouseenter', () => {
                item.querySelector('.hover-info').style.opacity = '1';
            });
            
            item.addEventListener('mouseleave', () => {
                item.querySelector('.hover-info').style.opacity = '0';
            });
        });

        // Add scroll effect for header
        window.addEventListener('scroll', () => {
            const header = document.querySelector('.main-header');
            if (window.scrollY > 0) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
    </script>
</body>
</html>
