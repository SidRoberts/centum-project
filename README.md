# Centum Project Skeleton

A quick starting point for projects based on the [Centum framework](https://github.com/SidRoberts/centum).



[![GitHub release](https://img.shields.io/github/release/SidRoberts/centum-project.svg?style=for-the-badge)]()

[![GitHub issues](https://img.shields.io/github/issues-raw/SidRoberts/centum-project.svg?style=for-the-badge)](https://github.com/SidRoberts/centum-project/issues)
[![GitHub pull requests](https://img.shields.io/github/issues-pr-raw/SidRoberts/centum-project.svg?style=for-the-badge)](https://github.com/SidRoberts/centum-project/pulls)

[![License](https://img.shields.io/github/license/SidRoberts/centum-project?style=for-the-badge)](LICENSE)



## 🚀 Quick Start

Create a new Centum-based project using Composer:

```bash
composer create-project sidroberts/centum-project YOUR-PROJECT-NAME -s dev

cd YOUR-PROJECT-NAME

docker compose up
```



## 📚 Documentation

- [Quick Start Guide](https://sidroberts.co.uk/centum/quick-start/)
- [Centum Framework Documentation](https://sidroberts.co.uk/centum/)



## 🧪 Testing

- **Static Analysis:**
  Run Psalm for static code analysis:
  ```bash
  composer analyse
  ```

- **Unit & Functional Tests:**
  Run tests with Codeception:
  ```bash
  composer test
  ```

- **Code Coverage:**
  Run tests with coverage report:
  ```bash
  composer test-coverage
  ```



## 🗂️ Project Structure

```
bin/           # Executables and scripts
config/        # Configuration files
public/        # Public web assets (entry point: index.php)
resources/     # Templates, assets, etc.
src/           # Application source code
tests/         # Test suites
vendor/        # Composer dependencies
```



## 📄 License

Whilst the [Centum framework is licensed under the MIT License](https://github.com/SidRoberts/centum-project/blob/main/LICENSE), **this skeleton project is released under the Unlicense license**.

See [LICENSE](LICENSE) for more details.
