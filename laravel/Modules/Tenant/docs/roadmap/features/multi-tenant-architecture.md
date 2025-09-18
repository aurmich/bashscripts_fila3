# Multi-tenant Architecture

## Overview
Implementation of the core multi-tenant architecture that enables hosting multiple tenants within the same application instance.

## Technical Implementation

### Tenant Identification
1. Server-based Resolution
   ```php
   public function execute(): string
   {
       // Get tenant name from server name
       $server_name = $this->getServerName('default');
       return $server_name;
   }
   ```

2. Domain Management
   - Domain model with Sushi integration
   - Domain-to-tenant mapping
   - Configuration per domain

### Configuration Management
1. Per-tenant Configuration
   ```php
   public static function config(string $key, $default = null): mixed
   {
       // Load tenant-specific configuration
       $tenant_name = self::getName();
       return config("tenants.{$tenant_name}.{$key}", $default);
   }
   ```

2. File Path Handling
   ```php
   public static function filePath(string $filename): string
   {
       // Get tenant-specific file path
       $path = base_path('config/' . self::getName() . '/' . $filename);
       return str_replace(['/', '\\'], [DIRECTORY_SEPARATOR, DIRECTORY_SEPARATOR], $path);
   }
   ```

### Service Provider Integration
1. Configuration Merging
   - Tenant-specific configurations
   - Module-specific overrides
   - Morphmap management

2. Database Registration
   - Tenant-specific connections
   - Connection management

## Dependencies
- Laravel Framework
- Sushi Package
- TenantService
- GetTenantNameAction

## Testing Requirements
1. Unit Tests
   - Test tenant resolution
   - Test configuration loading
   - Test file path handling

2. Integration Tests
   - Test multi-tenant routing
   - Test configuration isolation
   - Test database isolation

## Links
- [Back to Roadmap](../../docs/roadmap.md)
- Related: [Tenant Service Implementation](./tenant-service-implementation.md)
- Related: [Domain Management](./domain-management.md)
