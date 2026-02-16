# TV Station ERP

A comprehensive Enterprise Resource Planning system designed specifically for TV stations and broadcasting companies. Built with Laravel 11 and Livewire, this system manages content production, advertising, employee operations, and broadcasting workflows.

## Features

- **Content Management**
  - TV shows and series management
  - Episode tracking and scheduling
  - Content library organization
  - Rating and analytics

- **Advertising Operations**
  - Advertiser management
  - Advertisement campaign tracking
  - Ad placement scheduling
  - Revenue management

- **Human Resources**
  - Employee management
  - Department organization
  - Staff assignments
  - Role-based access control

- **Broadcasting Schedule**
  - Program scheduling
  - Timeline management
  - Conflict detection
  - Automated scheduling support

- **Analytics & Reporting**
  - Viewership ratings
  - Revenue reports
  - Performance analytics
  - Custom reporting

## Tech Stack

- **Framework**: Laravel 11.x
- **Frontend**: Livewire 3.x with Laravel UI
- **PHP**: 8.2+
- **Database**: SQLite (default), MySQL/PostgreSQL compatible
- **Authentication**: Laravel Sanctum
- **Styling**: Tailwind CSS
- **Build Tool**: Vite/Webpack Mix

## Requirements

- PHP >= 8.2
- Composer
- Node.js & NPM
- SQLite/MySQL/PostgreSQL

## Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/stukenov/tv-station-erp.git
   cd tv-station-erp
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node dependencies**
   ```bash
   npm install
   ```

4. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Database setup**
   ```bash
   # For SQLite (default)
   touch database/database.sqlite

   # Or configure MySQL/PostgreSQL in .env
   # DB_CONNECTION=mysql
   # DB_HOST=127.0.0.1
   # DB_PORT=3306
   # DB_DATABASE=tv_station_erp
   # DB_USERNAME=root
   # DB_PASSWORD=
   ```

6. **Run migrations**
   ```bash
   php artisan migrate
   ```

7. **Seed database (optional)**
   ```bash
   php artisan db:seed
   ```

8. **Build assets**
   ```bash
   npm run build
   # Or for development
   npm run dev
   ```

9. **Start the development server**
   ```bash
   php artisan serve
   ```

Visit `http://localhost:8000` in your browser.

## Database Structure

The system includes the following main models:

### Content Management
- **TvShow** - TV shows and series
- **Episode** - Individual episodes
- **Rating** - Viewership ratings and analytics

### Advertising
- **Advertiser** - Advertising clients
- **Advertisement** - Ad campaigns and materials

### Human Resources
- **Employee** - Staff members
- **Department** - Organizational departments
- **Staff** - Staff assignments and roles

### Operations
- **Schedule** - Broadcasting schedule
- **User** - System users with role-based access

## Key Features

### Content Production
- Manage TV shows, series, and episodes
- Track production status and metadata
- Schedule episode broadcasts
- Monitor viewership ratings

### Advertising Management
- Manage advertiser relationships
- Track advertising campaigns
- Schedule ad placements
- Monitor advertising revenue

### HR Management
- Employee profiles and records
- Department organization
- Staff assignments
- Attendance and performance tracking

### Schedule Management
- Automated scheduling algorithms
- Conflict detection and resolution
- Timeline visualization
- Multi-channel support

### Procurement
- Vendor management
- Purchase tracking
- Budget management
- Approval workflows

## Configuration

Key environment variables in `.env`:

```env
APP_NAME="TV Station ERP"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=sqlite

# Email configuration for notifications
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
```

## Development

```bash
# Run with hot reload
npm run dev

# Run tests
php artisan test

# Code formatting
./vendor/bin/pint

# Database refresh with seeding
php artisan migrate:fresh --seed
```

## Production Deployment

1. **Set environment to production**
   ```env
   APP_ENV=production
   APP_DEBUG=false
   ```

2. **Optimize application**
   ```bash
   composer install --optimize-autoloader --no-dev
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

3. **Build assets for production**
   ```bash
   npm run build
   ```

4. **Set up task scheduling** (add to crontab):
   ```
   * * * * * cd /path-to-app && php artisan schedule:run >> /dev/null 2>&1
   ```

5. **Configure queue workers** (for background jobs):
   ```bash
   php artisan queue:work --daemon
   ```

## API Documentation

The system provides API endpoints for:
- Content management (TV shows, episodes)
- Advertising operations
- Scheduling operations
- Analytics and reporting

API documentation is available at `/api/documentation` when `APP_ENV=local`.

## Security

- Store sensitive credentials in `.env` (never commit it)
- Use strong passwords for all accounts
- Enable HTTPS in production
- Regularly update dependencies
- Configure proper CORS settings
- Implement rate limiting for API endpoints

## Contributing

Contributions are welcome! Please follow these steps:

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## Testing

```bash
# Run all tests
php artisan test

# Run specific test suite
php artisan test --testsuite=Feature

# Run with coverage
php artisan test --coverage
```

## License

This project is open-sourced software licensed under the [MIT license](LICENSE).

## Author

Copyright (c) 2025 Saken Tukenov

## Support

For support, please open an issue on the GitHub repository.

## Acknowledgments

Built with Laravel, Livewire, and other amazing open-source projects.
