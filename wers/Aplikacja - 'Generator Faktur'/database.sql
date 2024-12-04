-- Tworzenie bazy danych, jeśli nie istnieje
CREATE DATABASE IF NOT EXISTS invoice_db;
USE invoice_db;

-- Tabela 'clients' - dane klientów
CREATE TABLE IF NOT EXISTS clients (
    id INT AUTO_INCREMENT PRIMARY KEY,  -- Unikalny identyfikator klienta
    name VARCHAR(255) NOT NULL,         -- Nazwa klienta
    address TEXT NOT NULL,              -- Adres klienta
    nip VARCHAR(20) NOT NULL UNIQUE     -- NIP klienta (unikalny)
);

-- Tabela 'invoices' - dane faktur
CREATE TABLE IF NOT EXISTS invoices (
    id INT AUTO_INCREMENT PRIMARY KEY,   -- Unikalny identyfikator faktury
    invoice_number VARCHAR(50) NOT NULL, -- Numer faktury (np. INV-2024-001)
    client_id INT NOT NULL,              -- ID klienta (klucz obcy)
    issue_date DATE NOT NULL,            -- Data wystawienia faktury
    due_date DATE NOT NULL,              -- Termin płatności faktury
    paid BOOLEAN DEFAULT 0,              -- Status opłacenia faktury (0 - nieopłacona, 1 - opłacona)
    FOREIGN KEY (client_id) REFERENCES clients(id) ON DELETE CASCADE
);

-- Tabela 'invoice_items' - pozycje faktury (produkty/usługi)
CREATE TABLE IF NOT EXISTS invoice_items (
    id INT AUTO_INCREMENT PRIMARY KEY,   -- Unikalny identyfikator pozycji faktury
    invoice_id INT NOT NULL,             -- ID faktury (klucz obcy)
    description VARCHAR(255) NOT NULL,   -- Opis produktu/usługi
    quantity DECIMAL(10,2) NOT NULL,     -- Ilość produktu/usługi
    unit_price DECIMAL(10,2) NOT NULL,   -- Cena jednostkowa
    vat_rate DECIMAL(5,2) NOT NULL,      -- Stawka VAT (np. 23.00)
    FOREIGN KEY (invoice_id) REFERENCES invoices(id) ON DELETE CASCADE
);

-- Przykładowe dane (można dodać więcej danych testowych)
-- Dodanie klientów
INSERT INTO clients (name, address, nip) VALUES 
('Firma A', 'ul. Testowa 1, 00-001 Warszawa', '1234567890'),
('Firma B', 'ul. Testowa 2, 00-002 Warszawa', '0987654321');

-- Dodanie faktur
INSERT INTO invoices (invoice_number, client_id, issue_date, due_date, paid) VALUES 
('INV-2024-001', 1, '2024-12-01', '2024-12-15', 0),  -- Faktura nieopłacona
('INV-2024-002', 2, '2024-12-02', '2024-12-16', 1);  -- Faktura opłacona

-- Dodanie pozycji na fakturach
INSERT INTO invoice_items (invoice_id, description, quantity, unit_price, vat_rate) VALUES
(1, 'Produkt A', 2, 100.00, 23.00),
(1, 'Usługa B', 1, 150.00, 23.00),
(2, 'Produkt C', 3, 50.00, 8.00);
