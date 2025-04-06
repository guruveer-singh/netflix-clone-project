# Using a high-quality Stranger Things Season 4 banner image
$imageUrl = "https://raw.githubusercontent.com/codeium-team/movie-images/main/stranger-things-banner.jpg"
$outputFile = "movies/stranger-things.jpg"

Write-Host "Downloading new Stranger Things image..."
try {
    $webClient = New-Object System.Net.WebClient
    $webClient.DownloadFile($imageUrl, $outputFile)
    Write-Host "Image downloaded successfully!"
} catch {
    Write-Host "Failed to download image: $_"
}
