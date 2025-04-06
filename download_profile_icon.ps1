# Download Netflix profile icon
$imageUrl = "https://upload.wikimedia.org/wikipedia/commons/0/0b/Netflix-avatar.png"
$outputFile = "images/profile-icon.png"

# Create images directory if it doesn't exist
New-Item -ItemType Directory -Force -Path "images"

Write-Host "Downloading profile icon..."
try {
    $webClient = New-Object System.Net.WebClient
    $webClient.DownloadFile($imageUrl, $outputFile)
    Write-Host "Profile icon downloaded successfully!"
} catch {
    Write-Host "Failed to download image: $_"
}
