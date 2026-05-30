# Security Policy

## Reporting a Vulnerability

If you discover a security vulnerability in this project, please **do not** open a public issue. Instead, please email the maintainer with details about the vulnerability.

### How to Report:
1. Send an email to the repository owner
2. Include:
   - Description of the vulnerability
   - Steps to reproduce (if applicable)
   - Potential impact
   - Suggested fix (if you have one)

3. Allow 48-72 hours for an initial response

## Supported Versions

| Version | Supported          |
| ------- | ------------------ |
| 1.0.x   | ✅ Yes (current)   |
| < 1.0   | ❌ No              |

## Security Updates

We take security seriously. Updates are provided for:
- Critical vulnerabilities (CVSS 9.0-10.0)
- High severity vulnerabilities (CVSS 7.0-8.9)
- Medium severity vulnerabilities (CVSS 4.0-6.9) affecting core functionality

## Dependency Management

This project uses:
- **Composer** for PHP dependencies
- **npm** for JavaScript dependencies

### Regular Audits

We perform security audits:
- Automated: Weekly via Dependabot
- Manual: Monthly

### Updating Dependencies

To check for security vulnerabilities:

```bash
# PHP dependencies
composer audit

# JavaScript dependencies
npm audit
```

To update all dependencies safely:

```bash
# PHP
composer update

# JavaScript
npm update
```

## Security Best Practices

1. **Keep dependencies updated** - Regular updates patch known vulnerabilities
2. **Use environment variables** - Never commit sensitive data (.env)
3. **Enable HTTPS** - Always use HTTPS in production
4. **Input validation** - Validate all user inputs
5. **CSRF protection** - Use Laravel's built-in CSRF tokens
6. **Rate limiting** - Implement rate limiting on critical endpoints

## Third-Party Components

This project includes:
- Laravel Framework & Ecosystem
- Symfony Components
- Vue.js
- TailwindCSS
- Bootstrap

We monitor these for known vulnerabilities through GitHub's Dependabot.

## Questions?

For security questions or concerns, please contact the repository maintainer privately.

---

**Last Updated:** May 29, 2026
**Security Policy Version:** 1.0
