# SETTribe — Project Development Guideline

> **Version:** 1.1.0  
> **Last Updated:** August 2026  
> **Maintained by:** SETTribe Development Team

This comprehensive document defines the end-to-end project development standards, workflows, and best practices to be followed across all SETTribe projects. It serves as the **single source of truth** for maintaining consistency, security, and scalability.

---

## 📑 Table of Contents

1. [Role-Based Usage Guide](#1-role-based-usage-guide)
2. [Project Development Process Overview](#2-project-development-process-overview)
3. [Environment Setup](#3-environment-setup)
4. [Coding Standards & Naming Conventions](#4-coding-standards--naming-conventions)
5. [Project Directory Structure](#5-project-directory-structure)
6. [Core Component Requirements](#6-core-component-requirements)
7. [Database Schema Standards](#7-database-schema-standards)
8. [File Upload Module](#8-file-upload-module)
9. [Repository Structure (Prod & Dev)](#9-repository-structure-prod--dev)
10. [Branching & Commit Guidelines](#10-branching--commit-guidelines)
11. [Pull Request Guidelines](#11-pull-request-guidelines)
12. [Project & Task Management (GitHub Kanban)](#12-project--task-management-github-kanban)
13. [Hostinger Deployment & CI/CD](#13-hostinger-deployment--cicd)
14. [MilesWeb Deployment & CI/CD](#14-milesweb-deployment--cicd)
15. [WABA Account Verification Process](#15-waba-account-verification-process)
16. [Remote Database Access (DBeaver)](#16-remote-database-access-dbeaver)
17. [Security & Best Practices](#17-security--best-practices)
18. [Onboarding Guide for New Developers](#18-onboarding-guide-for-new-developers)
19. [Role-Based Checklists](#19-role-based-checklists)
20. [Cloudflare R2 Implementation Guide](#20-cloudflare-r2-implementation-guide)

---

## 1. Role-Based Usage Guide

This document is designed for three primary roles. Each role should focus on relevant sections:

### 👨‍💻 Developer

**Primary Focus:** Day-to-day coding, Git workflow, and standards compliance.

| Section | Purpose |
|---------|---------|
| [Environment Setup](#3-environment-setup) | Set up local development environment |
| [Coding Standards](#4-coding-standards--naming-conventions) | Follow naming conventions |
| [Project Structure](#5-project-directory-structure) | Understand folder organization |
| [Branching & Commits](#10-branching--commit-guidelines) | Create branches and commit code |
| [PR Guidelines](#11-pull-request-guidelines) | Submit code for review |
| [DBeaver Setup](#16-remote-database-access-dbeaver) | Access remote databases |
| [Developer Checklist](#192-developer-checklist) | Daily/weekly tasks |

---

### 👨‍🏫 Team Lead

**Primary Focus:** Code reviews, task management, and team coordination.

| Section | Purpose |
|---------|---------|
| [Repository Structure](#9-repository-structure-prod--dev) | Manage Prod/Dev repos |
| [PR Guidelines](#11-pull-request-guidelines) | Review and approve PRs |
| [Task Management](#12-project--task-management-github-kanban) | Manage Kanban board |
| [Security Standards](#17-security--best-practices) | Ensure code quality |
| [Team Lead Checklist](#193-team-lead-checklist) | Weekly tasks |

---

### 📋 Project Owner

**Primary Focus:** Project initialization, deployment, and release management.

| Section | Purpose |
|---------|---------|
| [Process Overview](#2-project-development-process-overview) | Understand full lifecycle |
| [Repository Structure](#9-repository-structure-prod--dev) | Create and manage Prod repo |
| [Hostinger Deployment](#13-hostinger-deployment--cicd) | Deploy to Hostinger |
| [MilesWeb Deployment](#14-milesweb-deployment--cicd) | Deploy to MilesWeb |
| [WABA Verification](#15-waba-account-verification-process) | WhatsApp Business setup |
| [Project Owner Checklist](#194-project-owner-checklist) | Project milestones |

---

## 2. Project Development Process Overview

Every project at SETTribe follows a structured development lifecycle divided into three major phases:

```
┌─────────────────────────────────────────────────────────────────────────────┐
│                        PROJECT DEVELOPMENT LIFECYCLE                        │
├─────────────────────┬─────────────────────┬─────────────────────────────────┤
│   INITIALIZATION    │   CORE DEVELOPMENT  │         DEPLOYMENT              │
├─────────────────────┼─────────────────────┼─────────────────────────────────┤
│ • SRS/Concept Note  │ • Role-based Auth   │ • Domain Purchase & DNS         │
│ • Prototype Design  │ • Session Mgmt      │ • GitHub Integration            │
│ • Prod Repo Setup   │ • CRUD with PDO     │ • Hostinger/MilesWeb Deploy     │
│ • Dev Repo (Fork)   │ • Input Validation  │ • .htaccess Security            │
│ • Dual Databases    │ • File Validation   │ • Webhook Configuration         │
│ • Kanban Project    │ • Error Handling    │ • Live Testing                  │
│ • WABA Setup        │ • WABA Integration  │ • Release/Hotfix to Prod        │
└─────────────────────┴─────────────────────┴─────────────────────────────────┘
```

---

## 3. Environment Setup

### 3.1 Required Software

| Software | Purpose | Notes |
|----------|---------|-------|
| **XAMPP** | Local server (Apache/MySQL) | Install with Apache & MySQL selected |
| **Git** | Version control | Use default installation settings |
| **VS Code** | IDE | Recommended with extensions below |
| **DBeaver Community** | Database management | For remote MySQL access |
| **GitHub Account** | Repository hosting | Must be linked to organization |

### 3.2 VS Code Extensions

- **PHP Intelephense** — PHP code intelligence
- **ESLint** — JavaScript linting
- **Prettier** — Code formatting
- **GitLens** — Git integration
- **MySQL** — Database connectivity
- **PHP Debug** — Debugging support

### 3.3 Git Configuration (First-Time Setup)

```bash
git config --global user.name "Your Full Name"
git config --global user.email "your_email@settribe.com"
```

### 3.4 Workspace Setup

Organize all projects within the XAMPP `htdocs` directory:

```
C:\xampp\htdocs\repos\
├── Prod-CMS-ClientA\     # Production repo (Project Owner only)
├── Dev-CMS-ClientA\      # Development repo (Developers)
├── Prod-ERP-ClientB\
└── Dev-ERP-ClientB\
```

> **Path Convention:** `C:\xampp\htdocs\repos\<repo_name>`

---

## 4. Coding Standards & Naming Conventions

### 4.1 File & Folder Naming

> ⚠️ **All file and folder names MUST use camelCase only**

| Rule | Example ✅ | Anti-Pattern ❌ |
|------|-----------|----------------|
| Use camelCase | `userProfile.php` | `user_profile.php` |
| Start with lowercase | `adminDashboard.php` | `AdminDashboard.php` |
| No spaces or special chars | `fetchPage.php` | `Fetch Page.php` |
| Descriptive names | `batchReport.sql` | `report1.sql` |

**Examples:**
- `loginPage.php` ✅
- `userDashboard.php` ✅
- `fetchData.js` ✅
- `adminSettings.css` ✅

### 4.2 Variable Naming

Use **camelCase** for all variables:

```php
// ✅ Correct
$srNo = 1;
$batchNo = 'B001';
$userEmail = 'user@example.com';
$totalCount = 100;

// ❌ Incorrect
$sr_no = 1;
$Batch_No = 'B001';
$USEREMAIL = 'user@example.com';
```

### 4.3 Database Naming

- **Tables & Columns:** Use **camelCase**
- **Example:** `importantNotice`, `userId`, `createdAt`
- **Rule:** If column name exceeds 20 characters or is abbreviated, add a descriptive comment

### 4.4 Coding Best Practices

- ✅ Follow proper indentation and code formatting
- ✅ Keep functions small, reusable, and well-documented
- ✅ Avoid hardcoding values — use constants or config files
- ✅ Format SQL queries for readability
- ✅ Always sanitize inputs before database operations
- ✅ Implement file validation on both client and server side
- ✅ Ensure proper field-level validation for all forms
- ✅ Enforce strong password rules

---

## 5. Project Directory Structure

Every project must follow this standard folder hierarchy:

```
projectRoot/
├── assets/                 # CSS, JS, Bootstrap, third-party libraries
│   ├── css/
│   ├── js/
│   └── vendor/             # External libraries
├── images/                 # System images (categorized by module)
│   ├── slider/
│   ├── gallery/
│   └── icons/
├── uploads/                # User-uploaded content (organized by sub-folders)
│   ├── profile/            # User profile images
│   ├── punchInSelf/        # Attendance self-portraits
│   └── generalDocs/        # Identity documents (Aadhar, PAN, etc.)
├── include/                # Backend dependencies and core components
│   ├── dbConfig.php        # Database connection logic
│   ├── header.php          # Header component
│   ├── footer.php          # Footer component
│   ├── links.php           # CSS links and Page Title
│   ├── script.php          # JavaScript links
│   └── sweetAlert.php      # Alert configurations
├── ajax/                   # AJAX handlers
│   ├── fetchData.php
│   └── processForm.php
├── navbar.php              # Navigation bar component
├── customCss.php           # Project-specific CSS overrides
├── .htaccess               # Server configuration & security
├── .gitignore              # Git ignore rules
└── index.php               # Entry point
```

---

## 6. Core Component Requirements

### 6.1 Database Configuration (`dbConfig.php`)

```php
<?php
// Database Configuration
date_default_timezone_set('Asia/Kolkata');

$host = 'localhost';
$dbname = 'your_database';
$username = 'your_username';
$password = 'your_password';

try {
    $con = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
```

**Requirements:**
- Connection variable must be named `$con`
- Default timezone must be set to `Asia/Kolkata`
- Use PDO with prepared statements

> ⚠️ **Security Note:** Never hardcode database credentials directly in source code for production. Use environment variables or a `.env` file (excluded from Git via `.gitignore`) to store sensitive credentials. See [Section 17.4](#174-secure-credential-storage) for details.

### 6.2 Footer Standards (`footer.php`)

```php
<footer class="footer">
    <div class="container">
        <p>This website is owned by <strong><?php echo $clientName; ?></strong> 
           Developed & Maintained by <strong>SETTribe</strong></p>
    </div>
</footer>
```

### 6.3 Alerts (`sweetAlert.php`)

Centralized alert logic using SweetAlert or ToastAlert for consistent user feedback.

---

## 7. Database Schema Standards

### 7.1 Mandatory Columns

**Every table must include these columns:**

| Column | Type | Purpose |
|--------|------|---------|
| `id` | INT (Primary Key) | Unique record identifier |
| `createdAt` | DATETIME | Record creation timestamp |
| `createdBy` | INT | User ID of creator |
| `updatedAt` | DATETIME | Last modification timestamp |
| `updatedBy` | INT | User ID of last updater |
| `isDeleted` | ENUM('Yes','No') | Soft-delete flag (default: 'No') |

### 7.2 Required Logging Tables

All systems must implement:
- **`loginLogs`** — Track user authentication attempts
- **`smsLogs`** — Track SMS messages (if SMS function exists)
- **`emailLogs`** — Track emails (if email function exists)

---

## 8. File Upload Module

> 🚀 **Storage Standard:** For all new projects, Cloudflare R2 is the standard object storage solution. See [Section 20: Cloudflare R2 Implementation Guide](#20-cloudflare-r2-implementation-guide) for integration details.

### 8.1 Storage Path Structure

```
uploads/
├── profile/        # User profile images
├── punchInSelf/    # Attendance self-portraits
├── generalDocs/    # Identity documents
├── gallery/        # Gallery images
└── documents/      # General documents
```

### 8.2 File Naming Convention

**Pattern:** `[moduleName].[originalName].[timestamp].[extension]`

**Examples:**
- `gallery.holidayPhoto.1705920000.jpg`
- `profile.johnDoe.1705920123.png`
- `documents.contract.1705921000.pdf`

### 8.3 Security Measures

- ✅ Scan all files with anti-virus before production deployment
- ✅ Implement both client-side and server-side validation
- ✅ Use randomized file names to prevent enumeration attacks

---

## 9. Repository Structure (Prod & Dev)

### 9.1 Two-Repository Architecture

SETTribe uses a **two-repository model** for all projects:

```
┌──────────────────────────────────────────────────────────────────────────┐
│                         REPOSITORY ARCHITECTURE                          │
├────────────────────────────────┬─────────────────────────────────────────┤
│      PROD REPOSITORY           │         DEV REPOSITORY                  │
│   (Production - Main)          │      (Development - Fork)               │
├────────────────────────────────┼─────────────────────────────────────────┤
│ • Access: Project Owner ONLY   │ • Access: All Developers                │
│ • Connected to: Live Server    │ • Connected to: Dev Server              │
│ • Database: Production DB      │ • Database: Development DB              │
│ • Receives: Releases & Hotfixes│ • Receives: Feature branches            │
│ • Branch: main                 │ • Branch: main + feature branches       │
└────────────────────────────────┴─────────────────────────────────────────┘
                                      │
                                      ▼
                        Dev repo is a FORK of Prod repo
```

### 9.2 Repository Naming Convention

| Repository | Format | Example | Access |
|------------|--------|---------|--------|
| Production | `Prod-<product>-<client>` | `Prod-CMS-HJPMH` | Project Owner Only |
| Development | `Dev-<product>-<client>` | `Dev-CMS-HJPMH` | All Developers |

### 9.3 Repository Setup Process

#### Step 1: Create Production Repository (Project Owner)

1. Create new private repository: `Prod-<product>-<client>`
2. Initialize with README
3. Set up branch protection rules on `main`
4. Add only Project Owner as collaborator

#### Step 2: Fork to Development Repository (Project Owner)

1. Fork the Prod repo to create `Dev-<product>-<client>`
2. Add all developers as collaborators to Dev repo
3. Create GitHub Kanban project linked to Dev repo

#### Step 3: Developer Workflow

1. Developers clone **Dev repo only**
2. Create feature branches from `main`
3. Submit PRs to Dev repo's `main` branch
4. After approval, Team Lead merges to Dev `main`

#### Step 4: Release to Production (Project Owner)

1. When Dev is stable, create PR from Dev → Prod
2. PR type should be `release/vX.X.X` or `hotfix/bugName`
3. Project Owner reviews and merges to Prod
4. Prod auto-deploys to live server

### 9.4 Workflow Diagram

```
Developer → feat/featureName → PR → Dev main → release/v1.0 → PR → Prod main
              │                        │                              │
              └── Code Review ─────────┘                              │
                                                                      ▼
                                                              Live Production
```

---

## 10. Branching & Commit Guidelines

### 10.1 Branch Naming Convention

| Branch Type | Format | Example |
|-------------|--------|---------|
| Feature | `<developerName>/feat/<featureName>` | `mayuresh/feat/userAuthentication` |
| Bug Fix | `<developerName>/fix/<bugName>` | `mayuresh/fix/loginPageError` |
| Hotfix | `<developerName>/hotfix/<bugId>` | `mayuresh/hotfix/PROJ-123` |
| Refactor | `<developerName>/refactor/<area>` | `mayuresh/refactor/databaseQueries` |
| Release | `release/<version>` | `release/v1.2.0` |

### 10.2 Creating a New Branch

> ⚠️ **Never work directly on the `main` branch!**

```bash
# Create and switch to a new feature branch
git checkout -b mayuresh/feat/userDashboard

# Create a hotfix branch
git checkout -b mayuresh/hotfix/loginBug
```

### 10.3 Commit Message Format

**Format:** `<type>: <description>`

| Type | Usage | Example |
|------|-------|---------|
| `feat` | New feature | `feat: add user login page` |
| `fix` | Bug fix | `fix: resolve password reset issue` |
| `hotfix` | Critical production fix | `hotfix: fix payment gateway error` |
| `refactor` | Code restructuring | `refactor: optimize database queries` |
| `docs` | Documentation | `docs: update README` |
| `style` | Formatting changes | `style: fix indentation` |
| `test` | Adding tests | `test: add login unit tests` |

**Examples:**
```bash
git commit -m "feat: add two-factor authentication"
git commit -m "fix: resolve session timeout issue"
git commit -m "hotfix: fix critical payment bug"
git commit -m "refactor: optimize user query performance"
```

### 10.4 Development Workflow

```bash
# 1. Ensure you're on latest main
git checkout main
git pull origin main

# 2. Create new feature branch
git checkout -b mayuresh/feat/userProfile

# 3. Make your changes...

# 4. Stage changes
git add .

# 5. Commit with proper message
git commit -m "feat: add user profile management"

# 6. Push to GitHub
git push -u origin mayuresh/feat/userProfile

# 7. Create PR on GitHub
# 8. After merge, update local main
git checkout main
git pull origin main
```

---

## 11. Pull Request Guidelines

### 11.1 PR Types

| PR Type | From | To | Reviewer |
|---------|------|----|----------|
| Feature PR | `feat/*` | Dev `main` | Team Lead |
| Bug Fix PR | `fix/*` | Dev `main` | Team Lead |
| Release PR | Dev `main` | Prod `main` | Project Owner |
| Hotfix PR | `hotfix/*` | Prod `main` | Project Owner |

### 11.2 PR Naming Convention

**Format:** `[Type] Description`

**Examples:**
- `[feat] Add user authentication module`
- `[fix] Resolve login session timeout`
- `[release] v1.2.0 - Dashboard features`
- `[hotfix] Critical payment gateway fix`

### 11.3 Creating a Pull Request

1. Open repository on GitHub
2. Navigate to **Pull Requests** tab
3. Click **New Pull Request**
4. Select branches:
   - For features: `developerName/feat/featureName` → `main` (Dev repo)
   - For releases: Dev `main` → Prod `main`
5. Add descriptive title and description
6. Assign reviewer (Team Lead or Project Owner)
7. Click **Create Pull Request**

---

## 12. Project & Task Management (GitHub Kanban)

### 12.1 Project Setup

- **Project Type:** Kanban
- **Linked Repository:** Dev repo only (all development happens here)
- **Custom Fields:** Add **Man hrs** field (developer effort estimate)

> 👉 **Template:** [SETTribe Dev Project Template](https://github.com/orgs/SETTribe-IT-Solutions/projects/1)

### 12.2 Task Title Prefixes

| Prefix | Category | Example |
|--------|----------|---------|
| `[DB]` | Database | `[DB] Create User Table` |
| `[FE]` | Frontend | `[FE] Create Login Page` |
| `[BE]` | Backend | `[BE] Add DB Connection` |
| `[Bug]` | Bug/Defect | `[Bug] Login page not working` |
| `[Feature]` | Full Feature | `[Feature] User Authentication` |

### 12.3 Priority Labels

- **P0** → Critical / must fix immediately
- **P1** → High priority
- **P2** → Medium priority
- **P3** → Low priority

---

## 13. Hostinger Deployment & CI/CD

### 13.1 Connect GitHub to Hostinger

1. Log in to **Hostinger hPanel**
2. Select the relevant **Hosting Plan/Domain**
3. Navigate to **Advanced → Git**
4. Configure:
   - **Repository:** Paste GitHub Repository SSH path
   - **Branch:** `main`
   - **Directory:** Leave blank for root, or specify subdirectory
5. Click **Create**

### 13.2 Enable Auto-Deployment (Webhooks)

1. In Hostinger Git menu, locate your deployed repo
2. Click **Auto Deployment** button
3. **Copy** the Webhook URL
4. Go to **GitHub Repository → Settings → Webhooks**
5. Click **Add webhook**
6. Paste URL into **Payload URL**
7. Set Content type to `application/json`
8. Click **Add webhook**

### 13.3 Server Configuration

Create `include/dbConfig.php` manually on server with **Production Database** credentials (not tracked in Git).

---

## 14. MilesWeb Deployment & CI/CD

### 14.1 Overview

MilesWeb uses **cPanel** for hosting management. This guide covers connecting your GitHub repository to MilesWeb for automated deployments.

### 14.2 Prerequisites

- MilesWeb hosting account with cPanel access
- GitHub repository (Prod repo)
- SSH access enabled on MilesWeb

### 14.3 Phase 1: cPanel Git Setup

#### Step 1: Access cPanel Git Version Control

1. Log in to **MilesWeb cPanel**
2. Navigate to **Files → Git Version Control**
3. Click **Create** to set up a new repository

#### Step 2: Clone Repository

1. **Clone URL:** Enter your GitHub repository SSH URL
   ```
   git@github.com:SETTribe-IT-Solutions/Prod-ProjectName.git
   ```
2. **Repository Path:** Select deployment directory
   - For root domain: `/public_html`
   - For subdomain: `/public_html/subdomain`
3. **Repository Name:** Enter a descriptive name
4. Click **Create**

### 14.4 Phase 2: SSH Key Configuration

#### Step 1: Generate SSH Key on MilesWeb

1. In cPanel, go to **Security → SSH Access**
2. Click **Manage SSH Keys**
3. Click **Generate a New Key**
4. Fill in:
   - **Key Name:** `github_deploy`
   - **Key Password:** Leave empty for automated deployments
   - **Key Type:** RSA
   - **Key Size:** 4096
5. Click **Generate Key**

#### Step 2: Add SSH Key to GitHub

1. In cPanel SSH Access, click **View/Download** next to your public key
2. Copy the entire public key content
3. Go to **GitHub → Repository → Settings → Deploy Keys**
4. Click **Add deploy key**
5. Title: `MilesWeb Production Server`
6. Paste the public key
7. Check **Allow write access** (optional)
8. Click **Add key**

### 14.5 Phase 3: Webhook Configuration

#### Step 1: Create Deployment Script

Create a file `deploy.php` in your project root (add to .gitignore):

```php
<?php
// deploy.php - MilesWeb Auto Deployment Script
$secret = 'YOUR_SECRET_KEY_HERE'; // Change this!
$repoPath = '/home/username/public_html'; // Update path

// Verify webhook secret
$signature = $_SERVER['HTTP_X_HUB_SIGNATURE_256'] ?? '';
$payload = file_get_contents('php://input');
$hash = 'sha256=' . hash_hmac('sha256', $payload, $secret);

if (!hash_equals($hash, $signature)) {
    http_response_code(403);
    die('Invalid signature');
}

// Execute git pull
$output = [];
exec("cd $repoPath && git pull origin main 2>&1", $output, $returnCode);

// Log deployment
$log = date('Y-m-d H:i:s') . " - Deployment " . ($returnCode === 0 ? "SUCCESS" : "FAILED") . "\n";
$log .= implode("\n", $output) . "\n\n";
file_put_contents('deploy.log', $log, FILE_APPEND);

echo $returnCode === 0 ? 'Deployed successfully' : 'Deployment failed';
?>
```

#### Step 2: Configure GitHub Webhook

1. Go to **GitHub Repository → Settings → Webhooks**
2. Click **Add webhook**
3. Configure:
   - **Payload URL:** `https://yourdomain.com/deploy.php`
   - **Content type:** `application/json`
   - **Secret:** Same secret as in `deploy.php`
   - **Events:** Select "Just the push event"
4. Click **Add webhook**

### 14.6 Phase 4: Manual Deployment (Alternative)

If webhooks are not available, use cPanel's Git interface:

1. Go to **cPanel → Git Version Control**
2. Click **Manage** next to your repository
3. Click **Pull or Deploy** tab
4. Click **Update from Remote** to fetch latest changes
5. Click **Deploy HEAD Commit** to deploy

### 14.7 Database Configuration

1. Go to **cPanel → MySQL Databases**
2. Create production database
3. Create database user and assign to database
4. Create `include/dbConfig.php` on server with production credentials

### 14.8 Troubleshooting

| Issue | Solution |
|-------|----------|
| SSH connection failed | Verify SSH key is added to GitHub |
| Permission denied | Check file permissions (755 for folders, 644 for files) |
| Webhook not triggering | Verify webhook URL and secret |
| Deploy script not executing | Check PHP error logs in cPanel |

---

## 15. WABA Account Verification Process

### 15.1 Overview

WhatsApp Business API (WABA) requires account verification for sending business messages. This guide covers the complete verification process.

### 15.2 Prerequisites

- Facebook Business Manager account
- Valid business documentation
- Phone number for WhatsApp verification
- Business website with privacy policy

### 15.3 Phase 1: Facebook Business Verification

#### Step 1: Access Business Settings

1. Go to [business.facebook.com](https://business.facebook.com)
2. Navigate to **Business Settings → Security Center**
3. Click **Start Verification**

#### Step 2: Submit Business Documents

Required documents (any one):
- Business license or registration certificate
- Tax registration document (GST certificate for India)
- Utility bill (electricity, phone) with business name
- Bank statement with business name

#### Step 3: Domain Verification

1. Go to **Business Settings → Brand Safety → Domains**
2. Click **Add Domain**
3. Enter your business domain
4. Verify using one of these methods:
   - **DNS TXT Record** (Recommended)
   - Meta tag in website header
   - HTML file upload

**DNS TXT Record Example:**
```
Host: @
Type: TXT
Value: facebook-domain-verification=xxxxxxxxxxxxx
```

### 15.4 Phase 2: WhatsApp Business Account Setup

#### Step 1: Create WABA Account

1. Go to **Facebook Business Manager → WhatsApp Accounts**
2. Click **Add → Create a WhatsApp Account**
3. Fill in:
   - Account name
   - Timezone
   - Currency

#### Step 2: Add Phone Number

1. Select your WABA account
2. Go to **Phone Numbers → Add Phone Number**
3. Enter the phone number details:
   - **Display Name:** Your business name
   - **Phone Number:** Number to register
   - **Messaging Limit:** Tier 1 (1K unique users/24hrs)
4. Verify via SMS or Voice call

### 15.5 Phase 3: Business Profile Setup

#### Step 1: Configure Business Profile

1. Go to **WABA → Phone Numbers → Manage**
2. Click **Edit Profile**
3. Fill in:
   - **Business Description:** 256 characters max
   - **Address:** Full business address
   - **Email:** Business email
   - **Website:** Business website URL
   - **Profile Picture:** 640x640 px, < 5MB

### 15.6 Phase 4: Message Templates

#### Step 1: Create Message Templates

1. Go to **WABA → Message Templates**
2. Click **Create Template**
3. Fill in:
   - **Name:** template_name (lowercase, underscores)
   - **Category:** Marketing, Utility, or Authentication
   - **Language:** Select appropriate language
   - **Body:** Message content with variables

**Template Example:**
```
Hello {{1}},

Your OTP for login is: {{2}}

This code expires in 10 minutes.

- SETTribe Team
```

#### Step 2: Submit for Approval

1. Review template content
2. Click **Submit**
3. Wait for approval (usually 24-48 hours)

### 15.7 Phase 5: API Integration

#### Step 1: Generate Access Token

1. Go to **Facebook Developers → Your App**
2. Navigate to **WhatsApp → API Setup**
3. Click **Generate Access Token**
4. Copy and securely store the token

#### Step 2: Configure Webhook

1. In **WhatsApp → Configuration**
2. Set **Webhook URL:** `https://yourdomain.com/webhook/whatsapp`
3. Set **Verify Token:** Your custom verification token
4. Subscribe to events:
   - `messages`
   - `message_delivery`
   - `message_read`

### 15.8 Verification Checklist

- [ ] Facebook Business Manager created
- [ ] Business verification submitted
- [ ] Domain verified
- [ ] WABA account created
- [ ] Phone number registered and verified
- [ ] Business profile completed
- [ ] Message templates created and approved
- [ ] Access token generated
- [ ] Webhook configured
- [ ] Test message sent successfully

### 15.9 Common Verification Issues

| Issue | Solution |
|-------|----------|
| Business verification rejected | Ensure documents are clear and match business name |
| Domain verification failed | Check DNS propagation (wait 24-48 hours) |
| Phone number already registered | Contact WhatsApp support for number release |
| Template rejected | Review template guidelines, remove promotional language |

---

## 16. Remote Database Access (DBeaver)

### 16.1 Installation

1. Download DBeaver Community from the official website
2. Follow OS-specific installer steps
3. Launch DBeaver after installation

### 16.2 New MySQL Connection

1. Click **Database → New Database Connection**
2. Select **MySQL** and click **Next**

### 16.3 Connection Settings

| Field | Value |
|-------|-------|
| Host | `mysql.example.com` or IP address |
| Port | `3306` |
| Database | Your MySQL schema name |
| User | Database username |
| Password | Database password |

---

## 17. Security & Best Practices

### 17.1 Authentication & Authorization

- ✅ Implement role-based authentication (login/logout)
- ✅ Apply secure password hashing (`password_hash()` and `password_verify()`)
- ✅ Configure proper session management and access control
- ✅ Implement session timeout and regeneration

### 17.2 Input Validation & Sanitization

- ✅ Use PDO prepared statements for all database operations
- ✅ Validate file uploads (type, size, security)
- ✅ Sanitize all user inputs
- ✅ Use `htmlspecialchars()` for output encoding to prevent XSS

**SQL Injection Prevention (Prepared Statements):**

```php
// ❌ VULNERABLE — Never concatenate user input into queries
$query = "SELECT * FROM users WHERE email = '".$_POST['email']."' AND password='".$_POST['password']."'";
// A hacker can input: ' OR '1'='1  → bypasses authentication

// ✅ SECURE — Always use prepared statements
$stmt = $con->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
$stmt->execute([$email, $password]);
```

**XSS Prevention (Output Encoding):**

```php
// ❌ VULNERABLE — Never echo raw user input
echo $_GET['name'];
// A hacker can inject: <script>alert('hacked')</script>

// ✅ SECURE — Always encode output with htmlspecialchars()
echo htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
```

### 17.3 .htaccess Security

```apache
# Disable directory browsing
Options -Indexes

# Protect sensitive files
<FilesMatch "^\.">
    Order allow,deny
    Deny from all
</FilesMatch>

# Security headers
Header set X-Content-Type-Options "nosniff"
Header set X-Frame-Options "SAMEORIGIN"
Header set X-XSS-Protection "1; mode=block"
```

### 17.4 Secure Credential Storage

> ⚠️ **Never commit database passwords, API keys, or any sensitive credentials to Git.**

**Use a `.env` file** to store all sensitive configuration values:

```
# .env (must be in .gitignore — NEVER commit this file)
DB_HOST=localhost
DB_NAME=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
API_KEY=your_api_key
```

**Load credentials from `.env` in `dbConfig.php`:**

```php
<?php
// Read .env file
$envFile = __DIR__ . '/../.env';
if (file_exists($envFile)) {
    $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) continue;
        list($key, $value) = explode('=', $line, 2);
        $_ENV[trim($key)] = trim($value);
    }
}

date_default_timezone_set('Asia/Kolkata');

$host = $_ENV['DB_HOST'] ?? 'localhost';
$dbname = $_ENV['DB_NAME'] ?? '';
$username = $_ENV['DB_USERNAME'] ?? '';
$password = $_ENV['DB_PASSWORD'] ?? '';

try {
    $con = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
```

**Ensure `.gitignore` includes:**
```
.env
include/dbConfig.php
```

### 17.5 Brute Force Protection

Implement measures to prevent automated login attempts:

- ✅ **Login attempt limiting** — Lock accounts or add delay after 5 failed attempts
- ✅ **CAPTCHA** — Add CAPTCHA (e.g., Google reCAPTCHA) on login forms after repeated failures
- ✅ **Account lockout** — Temporarily lock accounts after multiple failed attempts
- ✅ **Login logging** — Log all login attempts in the `loginLogs` table (IP, timestamp, status)

**Example: Login Attempt Limiting**

```php
<?php
// Check failed login attempts in the last 30 minutes
$stmt = $con->prepare("SELECT COUNT(*) as attempts FROM loginLogs 
    WHERE email = ? AND status = 'failed' AND loginTime > DATE_SUB(NOW(), INTERVAL 30 MINUTE)");
$stmt->execute([$email]);
$result = $stmt->fetch();

if ($result['attempts'] >= 5) {
    die("Too many failed login attempts. Please try again after 30 minutes.");
}
?>
```

### 17.6 Web Application Firewall (WAF)

A **Web Application Firewall (WAF)** adds an extra layer of protection by filtering malicious traffic before it reaches the server.

**Recommended WAF Solutions:**

| WAF Provider | Type | Cost | Best For |
|-------------|------|------|----------|
| **Cloudflare** | Cloud-based | Free tier available | All projects |
| **Sucuri** | Cloud-based | Paid | WordPress/PHP sites |
| **ModSecurity** | Server-based | Free (open-source) | Self-managed servers |

**Setup Steps (Cloudflare — Recommended):**

1. Create a Cloudflare account at [cloudflare.com](https://cloudflare.com)
2. Add your domain and update nameservers
3. Enable **"Under Attack Mode"** during active threats
4. Configure firewall rules:
   - Block requests from known malicious IPs
   - Rate limit login endpoints
   - Challenge suspicious traffic with CAPTCHA
5. Enable **Bot Protection** and **DDoS Protection**

> 💡 **Tip:** Even the free Cloudflare plan provides basic WAF, DDoS protection, and SSL — it should be enabled on **every production project**.

> ⚠️ **Important:** If the hosting server does not provide a built-in WAF or firewall feature, the development team must set it up independently using a third-party service like Cloudflare (as described above). This is a **mandatory security requirement** and must not be skipped.

### 17.7 Server Log Monitoring

Regularly monitor server logs to detect suspicious activity:

- ✅ **Check Apache/Nginx access logs** for unusual request patterns
- ✅ **Monitor error logs** for repeated failed operations
- ✅ **Review `loginLogs` table** for failed authentication spikes
- ✅ **Set up alert notifications** for critical events

**Key Log Locations:**

| Hosting | Access Log | Error Log |
|---------|------------|-----------|
| **Hostinger** | hPanel → Files → Logs | hPanel → Files → Logs |
| **MilesWeb/cPanel** | cPanel → Metrics → Raw Access | cPanel → Metrics → Errors |
| **XAMPP (Local)** | `C:\xampp\apache\logs\access.log` | `C:\xampp\apache\logs\error.log` |

**What to Look For:**

- Multiple failed login attempts from the same IP
- Unusual access to admin or sensitive endpoints
- SQL injection patterns in URL parameters (e.g., `' OR 1=1`, `UNION SELECT`)
- Requests to non-existent files (directory traversal attempts)
- Abnormally large number of requests in short time (DDoS)

### 17.8 Backup & Recovery

Maintain regular backups and a tested recovery process:

> ⚠️ **Important:** If the hosting server does not provide automatic backup features, the development team must handle backups manually on their side. This includes scheduling regular database exports and downloading full site backups to a secure local or cloud storage. **Backups are a mandatory responsibility — they must not be ignored regardless of hosting limitations.**

**Backup Schedule:**

| Backup Type | Frequency | Includes |
|-------------|-----------|----------|
| **Full Site Backup** | Weekly | All files + database |
| **Database Backup** | Daily | Database export (`.sql`) |
| **Pre-Release Backup** | Before every deployment | Full site + database |

**Backup Methods:**

| Hosting | Method |
|---------|--------|
| **Hostinger** | hPanel → Files → Backups → Generate/Download |
| **MilesWeb/cPanel** | cPanel → Files → Backup Wizard → Full/Partial Backup |
| **Manual (Database)** | Use DBeaver or phpMyAdmin to export `.sql` file |

**Recovery Checklist (Restoring from Clean Backup):**

1. Download the last known clean backup
2. Take the compromised site offline (maintenance mode)
3. Restore files from backup
4. Restore database from backup
5. Reset all user and admin passwords
6. Update `dbConfig.php` with new credentials
7. Clear all active sessions
8. Verify restored site functionality
9. Re-enable the site and monitor closely

### 17.9 Incident Response Plan

If the website is compromised or a security breach is suspected, follow this step-by-step process:

**🚨 Immediate Actions (Within 1 Hour):**

1. **Take the site offline** — Enable maintenance mode or temporarily restrict access
2. **Reset all passwords** — Admin, database, cPanel/hPanel, FTP, and API keys
3. **Notify the Project Owner and Team Lead** immediately

**🔍 Investigation (Within 24 Hours):**

4. **Download all website files** — Take a snapshot of the current state for analysis
5. **Search for suspicious or unknown code** — Look for:
   - Unknown PHP files (especially in `/uploads/`, root directory)
   - Obfuscated code (`base64_decode`, `eval()`, `exec()`, `shell_exec()`)
   - Hidden backdoor files (e.g., `shell.php`, `c99.php`, random-named `.php` files)
6. **Check recently modified files** — Run the following on the server:
   ```bash
   # Find files modified in the last 7 days
   find /public_html -type f -mtime -7 -ls
   ```
7. **Scan server logs for unusual activity** — Check access logs and error logs for:
   - Unfamiliar IP addresses accessing admin pages
   - POST requests to unexpected files
   - SQL injection or XSS patterns in URLs
8. **Run malware scan** — Use hosting provider's built-in scanner or tools like:
   - Hostinger: hPanel → Security → Malware Scanner
   - cPanel: ImunifyAV / ClamAV Scanner

**🔧 Recovery:**

9. **Restore from a clean backup** — Use the most recent backup taken before the breach
10. **Patch the vulnerability** — Identify and fix the security gap that was exploited
11. **Re-deploy the clean codebase** — Push from a clean Git repository

**✅ Post-Recovery:**

12. **Verify all functionality** — Test the restored site thoroughly
13. **Enable WAF** — Set up Cloudflare or another WAF if not already active
14. **Document the incident** — Record what happened, how it was fixed, and lessons learned
15. **Monitor closely** — Watch logs and access patterns for at least 2 weeks after recovery

---

## 18. Onboarding Guide for New Developers

### 18.1 Day 1 Setup

1. **Install Required Software:**
   - XAMPP, Git, VS Code, DBeaver

2. **Configure Git:**
   ```bash
   git config --global user.name "Your Name"
   git config --global user.email "your_email@settribe.com"
   ```

3. **Clone Dev Repository:**
   ```bash
   cd C:/xampp/htdocs/repos
   git clone <dev_repo_url>
   ```

### 18.2 First Week Tasks

- [ ] Read this entire guideline document
- [ ] Review branching & commit guidelines
- [ ] Set up local database
- [ ] Create first feature branch
- [ ] Complete first PR with mentor review

---

## 19. Role-Based Checklists

### 19.1 Project Initialization Checklist (Project Owner)

- [ ] Prepare SRS or Concept Note
- [ ] Design and validate application prototype
- [ ] Create Production repository (`Prod-*`)
- [ ] Fork to Development repository (`Dev-*`)
- [ ] Add webhooks on server for Prod repository
- [ ] Create separate databases for Dev and Prod
- [ ] Create GitHub Kanban project for Dev repository
- [ ] Set up WABA account (if WhatsApp integration needed)
- [ ] Configure DNS and domain settings

### 19.2 Developer Checklist

**Daily Tasks:**
- [ ] Pull latest changes from `main`
- [ ] Create feature branch (if new task)
- [ ] Follow coding standards (camelCase)
- [ ] Commit with proper message format (`feat:`, `fix:`, etc.)
- [ ] Push changes and create PR when ready

**Weekly Tasks:**
- [ ] Review and respond to PR feedback
- [ ] Update task status on Kanban board
- [ ] Log time spent (Man hrs)

### 19.3 Team Lead Checklist

**Daily Tasks:**
- [ ] Review pending PRs (respond within 4 hours for P1)
- [ ] Check Kanban board for blockers
- [ ] Ensure code follows naming conventions

**Weekly Tasks:**
- [ ] Update sprint progress with Project Owner
- [ ] Review code quality across team
- [ ] Mentor junior developers

**Per PR Review:**
- [ ] Code follows camelCase naming
- [ ] No hardcoded values
- [ ] SQL uses prepared statements
- [ ] Input validation implemented
- [ ] Error handling in place
- [ ] No sensitive data in code
- [ ] Functions are small and reusable

### 19.4 Project Owner Checklist

**Project Start:**
- [ ] Create Prod repo
- [ ] Fork to Dev repo
- [ ] Set up server environments (Hostinger/MilesWeb)
- [ ] Configure webhooks
- [ ] Create databases
- [ ] Set up WABA (if needed)
- [ ] Create first milestone/sprint

**Per Release:**
- [ ] Review release PR from Dev → Prod
- [ ] Verify all features work on staging
- [ ] Approve and merge to Prod
- [ ] Verify production deployment
- [ ] Create release notes

**Monthly:**
- [ ] Review project progress
- [ ] Update documentation if needed
- [ ] Review security and access permissions
- [ ] Backup verification

---

## 20. Cloudflare R2 Implementation Guide

The **Cloudflare R2 Object Storage** implementation is a core standard for all SETTribe projects requiring scalable file storage. It provides an S3-compatible, zero-egress-fee storage solution.

**Key Requirements:**
- **AWS SDK for PHP:** Use `aws/aws-sdk-php:~3.297.0` via Composer.
- **Environment Variables:** Credentials MUST be stored securely in a `.env` file (`R2_ACCESS_KEY_ID`, `R2_SECRET_ACCESS_KEY`, `R2_ENDPOINT`, `R2_BUCKET_NAME`, `R2_PUBLIC_URL`).
- **Core Configuration:** Implement `include/r2_config.php` as the single source of truth for R2 operations, and `include/loadenv.php` for loading environment variables.
- **Security:** Never commit `.env` or hardcode credentials. Validate files before upload, sanitize filenames, and store only the **object key** in the database.

> 📖 **Full Documentation:** For complete setup steps, code templates, helper functions, and troubleshooting, refer to the standalone [Cloudflare R2 Implementation Guide](cloudflare_r2_implementation_guide.md).

---

## 📚 Quick Reference

### Branch & Commit Commands

```bash
# Create feature branch
git checkout -b developerName/feat/featureName

# Create hotfix branch
git checkout -b developerName/hotfix/bugName

# Commit feature
git commit -m "feat: add new user dashboard"

# Commit fix
git commit -m "fix: resolve login issue"

# Commit hotfix
git commit -m "hotfix: critical payment error"
```

### Repository Structure

```
Prod-<product>-<client>/    # Production (Project Owner only)
    └── main branch         # Connected to live server

Dev-<product>-<client>/     # Development (Fork of Prod)
    ├── main branch         # Stable dev code
    ├── feat/* branches     # New features
    ├── fix/* branches      # Bug fixes
    └── Kanban Project      # Task tracking
```

---

> **Document maintained by:** SETTribe Development Team  
> **For questions or updates:** Contact the Tech Lead

---

_©️ SETTribe IT Solutions — All Rights Reserved_
