# Documentazione Database Modulo Incentivi

## 1. Schema del Database

### 1.1 Tabelle Principali

#### projects
```sql
CREATE TABLE projects (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    type ENUM('lavori', 'servizi', 'forniture', 'misto') NOT NULL,
    status ENUM('active', 'completed', 'cancelled') NOT NULL DEFAULT 'active',
    amount DECIMAL(15,2) NOT NULL,
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    deleted_at TIMESTAMP NULL DEFAULT NULL
);
```

#### activities
```sql
CREATE TABLE activities (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    project_id BIGINT UNSIGNED NOT NULL,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    type ENUM('technical', 'administrative', 'management') NOT NULL,
    status ENUM('pending', 'in_progress', 'completed', 'cancelled') NOT NULL DEFAULT 'pending',
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    FOREIGN KEY (project_id) REFERENCES projects(id) ON DELETE CASCADE
);
```

#### employees
```sql
CREATE TABLE employees (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    role ENUM('RUP', 'collaborator', 'manager') NOT NULL,
    department VARCHAR(255),
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    deleted_at TIMESTAMP NULL DEFAULT NULL
);
```

#### activity_employee
```sql
CREATE TABLE activity_employee (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    activity_id BIGINT UNSIGNED NOT NULL,
    employee_id BIGINT UNSIGNED NOT NULL,
    percentage DECIMAL(5,2) NOT NULL DEFAULT 100.00,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    FOREIGN KEY (activity_id) REFERENCES activities(id) ON DELETE CASCADE,
    FOREIGN KEY (employee_id) REFERENCES employees(id) ON DELETE CASCADE
);
```

#### incentive_calculations
```sql
CREATE TABLE incentive_calculations (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    project_id BIGINT UNSIGNED NOT NULL,
    base_amount DECIMAL(15,2) NOT NULL,
    base_percentage DECIMAL(5,2) NOT NULL,
    total_percentage DECIMAL(5,2) NOT NULL,
    total_amount DECIMAL(15,2) NOT NULL,
    innovation_fund DECIMAL(15,2) NOT NULL,
    employee_share DECIMAL(15,2) NOT NULL,
    status ENUM('draft', 'pending', 'approved', 'rejected') NOT NULL DEFAULT 'draft',
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    FOREIGN KEY (project_id) REFERENCES projects(id) ON DELETE CASCADE
);
```

#### incentive_penalties
```sql
CREATE TABLE incentive_penalties (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    calculation_id BIGINT UNSIGNED NOT NULL,
    type ENUM('delay', 'cost_increase', 'non_conformity') NOT NULL,
    value DECIMAL(5,2) NOT NULL,
    percentage DECIMAL(5,2) NOT NULL,
    description TEXT,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    FOREIGN KEY (calculation_id) REFERENCES incentive_calculations(id) ON DELETE CASCADE
);
```

#### incentive_quotes
```sql
CREATE TABLE incentive_quotes (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    calculation_id BIGINT UNSIGNED NOT NULL,
    employee_id BIGINT UNSIGNED NOT NULL,
    percentage DECIMAL(5,2) NOT NULL,
    amount DECIMAL(15,2) NOT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    FOREIGN KEY (calculation_id) REFERENCES incentive_calculations(id) ON DELETE CASCADE,
    FOREIGN KEY (employee_id) REFERENCES employees(id) ON DELETE CASCADE
);
```

#### settlements
```sql
CREATE TABLE settlements (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    calculation_id BIGINT UNSIGNED NOT NULL,
    employee_id BIGINT UNSIGNED NOT NULL,
    amount DECIMAL(15,2) NOT NULL,
    status ENUM('pending', 'approved', 'rejected', 'paid', 'cancelled') NOT NULL DEFAULT 'pending',
    payment_date DATE,
    payment_method ENUM('bank_transfer', 'check', 'cash'),
    notes TEXT,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    FOREIGN KEY (calculation_id) REFERENCES incentive_calculations(id) ON DELETE CASCADE,
    FOREIGN KEY (employee_id) REFERENCES employees(id) ON DELETE CASCADE
);
```

### 1.2 Tabelle di Supporto

#### project_documents
```sql
CREATE TABLE project_documents (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    project_id BIGINT UNSIGNED NOT NULL,
    name VARCHAR(255) NOT NULL,
    type VARCHAR(50) NOT NULL,
    path VARCHAR(255) NOT NULL,
    size INT UNSIGNED NOT NULL,
    mime_type VARCHAR(100) NOT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    FOREIGN KEY (project_id) REFERENCES projects(id) ON DELETE CASCADE
);
```

#### activity_logs
```sql
CREATE TABLE activity_logs (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id BIGINT UNSIGNED NOT NULL,
    action VARCHAR(50) NOT NULL,
    model_type VARCHAR(100) NOT NULL,
    model_id BIGINT UNSIGNED NOT NULL,
    changes JSON,
    created_at TIMESTAMP NULL DEFAULT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);
```

## 2. Indici

### 2.1 Indici Principali
```sql
-- projects
CREATE INDEX idx_projects_type ON projects(type);
CREATE INDEX idx_projects_status ON projects(status);
CREATE INDEX idx_projects_dates ON projects(start_date, end_date);

-- activities
CREATE INDEX idx_activities_project ON activities(project_id);
CREATE INDEX idx_activities_type ON activities(type);
CREATE INDEX idx_activities_status ON activities(status);
CREATE INDEX idx_activities_dates ON activities(start_date, end_date);

-- employees
CREATE INDEX idx_employees_role ON employees(role);
CREATE INDEX idx_employees_department ON employees(department);

-- incentive_calculations
CREATE INDEX idx_calculations_project ON incentive_calculations(project_id);
CREATE INDEX idx_calculations_status ON incentive_calculations(status);

-- settlements
CREATE INDEX idx_settlements_calculation ON settlements(calculation_id);
CREATE INDEX idx_settlements_employee ON settlements(employee_id);
CREATE INDEX idx_settlements_status ON settlements(status);
```

### 2.2 Indici di Supporto
```sql
-- project_documents
CREATE INDEX idx_documents_project ON project_documents(project_id);
CREATE INDEX idx_documents_type ON project_documents(type);

-- activity_logs
CREATE INDEX idx_logs_user ON activity_logs(user_id);
CREATE INDEX idx_logs_model ON activity_logs(model_type, model_id);
CREATE INDEX idx_logs_date ON activity_logs(created_at);
```

## 3. Relazioni

### 3.1 Relazioni Principali
- Project -> Activities (1:N)
- Activity -> Employees (N:N)
- Project -> IncentiveCalculation (1:1)
- IncentiveCalculation -> Penalties (1:N)
- IncentiveCalculation -> Quotes (1:N)
- Quote -> Settlement (1:1)

### 3.2 Relazioni di Supporto
- Project -> Documents (1:N)
- User -> ActivityLogs (1:N)

## 4. Trigger

### 4.1 Trigger di Calcolo
```sql
DELIMITER //

CREATE TRIGGER after_activity_insert
AFTER INSERT ON activities
FOR EACH ROW
BEGIN
    -- Aggiorna il calcolo dell'incentivo
    CALL update_project_incentive(NEW.project_id);
END //

CREATE TRIGGER after_activity_update
AFTER UPDATE ON activities
FOR EACH ROW
BEGIN
    -- Aggiorna il calcolo dell'incentivo
    CALL update_project_incentive(NEW.project_id);
END //

DELIMITER ;
```

### 4.2 Trigger di Log
```sql
DELIMITER //

CREATE TRIGGER after_settlement_insert
AFTER INSERT ON settlements
FOR EACH ROW
BEGIN
    -- Registra l'evento nel log
    INSERT INTO activity_logs (user_id, action, model_type, model_id, changes)
    VALUES (NEW.created_by, 'create', 'settlement', NEW.id, JSON_OBJECT('amount', NEW.amount));
END //

DELIMITER ;
```

## 5. Stored Procedures

### 5.1 Procedure di Calcolo
```sql
DELIMITER //

CREATE PROCEDURE update_project_incentive(IN project_id BIGINT)
BEGIN
    -- Aggiorna il calcolo dell'incentivo per il progetto
    UPDATE incentive_calculations
    SET total_amount = calculate_total_amount(project_id),
        employee_share = calculate_employee_share(project_id)
    WHERE project_id = project_id;
END //

DELIMITER ;
```

### 5.2 Procedure di Report
```sql
DELIMITER //

CREATE PROCEDURE generate_incentive_report(
    IN start_date DATE,
    IN end_date DATE,
    IN project_type VARCHAR(50)
)
BEGIN
    -- Genera il report degli incentivi
    SELECT 
        p.name as project_name,
        p.type as project_type,
        ic.total_amount as incentive_amount,
        ic.innovation_fund,
        ic.employee_share
    FROM projects p
    JOIN incentive_calculations ic ON p.id = ic.project_id
    WHERE p.start_date BETWEEN start_date AND end_date
    AND (project_type IS NULL OR p.type = project_type);
END //

DELIMITER ;
```

## 6. Backup e Ripristino

### 6.1 Backup
```bash
# Backup completo
mysqldump -u user -p database > backup.sql

# Backup specifico per il modulo
mysqldump -u user -p database projects activities employees activity_employee incentive_calculations incentive_penalties incentive_quotes settlements > incentive_backup.sql
```

### 6.2 Ripristino
```bash
# Ripristino completo
mysql -u user -p database < backup.sql

# Ripristino specifico per il modulo
mysql -u user -p database < incentive_backup.sql
```

## 7. Manutenzione

### 7.1 Pulizia Dati
```sql
-- Rimuove i progetti cancellati più vecchi di 1 anno
DELETE FROM projects 
WHERE deleted_at < DATE_SUB(NOW(), INTERVAL 1 YEAR);

-- Rimuove i log più vecchi di 6 mesi
DELETE FROM activity_logs 
WHERE created_at < DATE_SUB(NOW(), INTERVAL 6 MONTH);
```

### 7.2 Ottimizzazione
```sql
-- Analizza le tabelle
ANALYZE TABLE projects, activities, employees, incentive_calculations, settlements;

-- Ottimizza le tabelle
OPTIMIZE TABLE projects, activities, employees, incentive_calculations, settlements;
```

## 8. Monitoraggio

### 8.1 Query di Monitoraggio
```sql
-- Numero di progetti per tipo
SELECT type, COUNT(*) as count
FROM projects
GROUP BY type;

-- Numero di liquidazioni per stato
SELECT status, COUNT(*) as count
FROM settlements
GROUP BY status;

-- Importo totale incentivi per mese
SELECT 
    DATE_FORMAT(created_at, '%Y-%m') as month,
    SUM(total_amount) as total
FROM incentive_calculations
GROUP BY month
ORDER BY month DESC;
```

### 8.2 Performance
```sql
-- Query lente
SHOW PROCESSLIST;

-- Indici mancanti
SELECT 
    TABLE_NAME,
    COLUMN_NAME,
    INDEX_NAME
FROM information_schema.STATISTICS
WHERE TABLE_SCHEMA = 'database'
AND INDEX_NAME = 'PRIMARY';
``` 