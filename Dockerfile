# Use official PHP image with CLI and Alpine for smaller size
FROM php:8.4-cli-alpine

# Set working directory
WORKDIR /var/www/html

# Copy application files
COPY src/ .

# Expose port 8000
EXPOSE 8080

# Start PHP's built-in web server
CMD ["php", "-S", "0.0.0.0:8080"]
