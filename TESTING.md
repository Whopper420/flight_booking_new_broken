# Flight Booking System

## Testing Strategy

This project implements a continuous integration (CI) pipeline using GitHub Actions for automated unit testing.

### How to Use

1. **Running Unit Tests Locally:**
   ```bash
   php artisan test --testsuite=Unit
   ```

2. **Running All Tests:**
   ```bash
   php artisan test
   ```

### CI Pipeline

The GitHub Actions workflow is configured to:
- Run on every push to `main` or `master` branch
- Run on every pull request to `main` or `master` branch
- Execute unit tests only (no code linting)
- Use PHP 8.2 runtime environment
- Create an SQLite database for testing

### Unit Tests

The unit tests cover:
- Model fillable attributes
- Model table names
- Business logic validations
- Data integrity checks

### GitHub Integration

To use this CI pipeline:
1. Push your changes to the GitHub repository
2. Navigate to the "Actions" tab in your GitHub repository
3. Monitor the workflow execution
4. Check the results of the automated tests

The workflow will automatically trigger on code pushes and pull requests, ensuring code quality and catching regressions early in the development cycle.