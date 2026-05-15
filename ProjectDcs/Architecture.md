# Architecture - ksf_FA_JobDescriptions

## Document Information
- **Module**: ksf_FA_JobDescriptions
- **Version**: 1.0.0
- **Date**: 2026-05-11
- **Status**: Implemented
- **Author**: KSFII Development Team

---

## 1. Module Overview

ksf_FA_JobDescriptions provides FrontAccounting integration for jobdescriptions functionality.

### 1.1 Namespace
`Ksfraser\FA\Jobdescriptions`

### 1.2 FA Module Structure
```
ksf_FA_JobDescriptions/
├── hooks.php           # Module hooks
├── pages/              # UI pages
├── src/                # Adapters
└── Integration/        # DB adapters
```

---

## 2. Hooks Integration

### 2.1 Module Registration

```php
class hooks_fajobdescriptions extends hooks {
    var $module_name = 'fa_jobdescriptions';
    
    function install_options($app) {
        // Menu items
    }
    
    function install_access() {
        // Security areas
    }
}
```

### 2.2 Security Areas

| Constant | Description |
|----------|-------------|
| SA_JOBDESCRIPTIONS_VIEW | View access |
| SA_JOBDESCRIPTIONS_EDIT | Edit access |

---

## 3. Database Adapters

| Adapter | Description |
|---------|-------------|
| DebtorAdapter | FA debtor integration |
| EmployeeAdapter | HRM employee link |
| GLAdapter | GL code mapping |

---

## 4. Page Templates

| Page | Description |
|------|-------------|
| jobdescriptions-list.php | List view |
| jobdescriptions-edit.php | Edit form |
| jobdescriptions-view.php | Detail view |

---

*Document Version: 1.0.0*
*Last Updated: 2026-05-11*
