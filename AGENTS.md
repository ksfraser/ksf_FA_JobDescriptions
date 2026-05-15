# AGENTS.md - ksf_FA_JobDescriptions#

## Architecture Overview#

**FA Module** for Job Description Management - create, version, and link to HRM recruitment.

### Core Principles#
- **SOLID**, **DRY**, **TDD**, **DI**, **SRP**#

## Repository Structure#

```
ksf_FA_JobDescriptions/
├── sql/#
│   ├── fa_job_descriptions.sql#
│   └── fa_job_skills.sql#
├── includes/#
│   ├── job_desc_db.inc#
│   └── skills_db.inc#
├── pages/#
├── hooks.php#
├── composer.json#
└── ProjectDocs/#
```

## Dependencies#

- **ksf_FA_JobDescriptions_Core** (business logic)#
- **ksf_FA_HRM** (link to positions)#
- **ksf_FA_Recruitment** (link to job openings)#
- **FrontAccounting 2.4+**#
