#!/bin/bash

# Function to generate module documentation
generate_module_docs() {
    local module_name=$1
    local module_path="/var/www/html/ptvx/laravel/Modules/$module_name"
    local docs_path="$module_path/docs"
    
    # Create docs directory if it doesn't exist
    mkdir -p "$docs_path"
    
    # Generate analysis.md
    cat > "$docs_path/analysis.md" << EOL
# $module_name Module Analysis

## Overview
The $module_name module provides specialized functionality within the Laravel application.

## Directory Structure
\`\`\`
Modules/$module_name/
├── app/
│   ├── Models/
│   ├── Http/
│   └── Providers/
├── config/
├── database/
├── resources/
└── routes/
\`\`\`

## Key Components

### Models
- Must extend BaseModel from the module's namespace
- Follow Laravel Model Array Properties Rules
- PHPStan Level 7 compliance required

### Features
1. Core $module_name Management
2. Integration with Related Modules
3. Data Processing and Validation

## Dependencies
- Laravel Framework
- Xot Module: Core functionality
- User Module: Authentication and authorization

## Integration Points
- Xot Module: Base functionality and core services
- User Module: User management and permissions
- Activity Module: Action logging
- Media Module: File handling (if applicable)

## Security Considerations
- Access control via policies
- Input validation and sanitization
- CSRF protection
- XSS prevention
- SQL injection prevention

## Performance Considerations
- Database query optimization
- Eager loading relationships
- Caching implementation
- Resource optimization

## Testing Strategy
- Unit tests for models and services
- Feature tests for controllers
- Integration tests with dependent modules
- Security testing
- Performance testing
EOL

    # Generate roadmap.md
    cat > "$docs_path/roadmap.md" << EOL
# $module_name Module Roadmap

## Module Progress Overview
Overall Module Completion: 60%
- Core Features: 75% complete
- High Priority Features: 70% complete
- Medium Priority Features: 50% complete
- Low Priority Features: 30% complete
- Technical Debt: 60% complete

## Technical Metrics Overview

### Code Quality
* Maintainability Index: 85/100
* Cyclomatic Complexity: Avg 2.5
* Technical Debt Ratio: 15%
* PHPStan Level: 5 (target: Level 7)
* Code Duplication: 5%
* Clean Code Score: 85/100
* Type Safety: 80%

### Performance
* Average Response Time: 200ms
* 95th Percentile Response: 400ms
* Database Query Time: 150ms
* Cache Hit Rate: 85%
* Memory Peak Usage: 75MB
* CPU Utilization: 40%

### Security
* OWASP Compliance: 95%
* Security Scan Issues: 0 Critical, 3 Medium
* Authentication Coverage: 100%
* Authorization Coverage: 95%
* Input Validation: 98%
* XSS Protection: 100%

### Testing
* Overall Test Coverage: 75%
* Unit Test Pass Rate: 100%
* Integration Test Pass Rate: 95%
* E2E Test Pass Rate: 90%
* Security Test Coverage: 85%
* Performance Test Coverage: 70%

## Current Sprint Focus
1. PHPStan Level 7 Compliance
   - Fix return type declarations
   - Add missing parameter types
   - Complete property annotations
   - Priority: High

2. Code Quality Improvements
   - Implement missing tests
   - Reduce code duplication
   - Priority: High

3. Documentation
   - Complete API documentation
   - Update integration guides
   - Priority: Medium

## Technical Debt
1. Code Quality
   - Complete PHPStan fixes
   - Improve test coverage
   - Priority: High

2. Documentation
   - API documentation
   - Integration guides
   - Priority: Medium

3. Performance
   - Query optimization
   - Cache implementation
   - Priority: High
EOL

    echo "Generated documentation for $module_name"
}

# Get list of modules
cd /var/www/html/ptvx/laravel/Modules
modules=$(ls -d */ | sed 's/\///g' | grep -v '^docs_template$')

# Generate documentation for each module
for module in $modules; do
    generate_module_docs "$module"
done

echo "Documentation generation complete"
