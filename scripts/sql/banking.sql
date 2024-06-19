-- Create the BankingDB by connecting to pgpadmin
-- host: host.docker.internal
-- u: admin
-- p: password
-- port: 5435
-- \c BankingDB;

-- Create the customers table
CREATE TABLE customers (
                           id SERIAL PRIMARY KEY,
                           name VARCHAR(255) NOT NULL,
                           address VARCHAR(255),
                           email VARCHAR(255) UNIQUE NOT NULL
);

-- Create the accounts table with a link to customers
CREATE TABLE accounts (
                          id SERIAL PRIMARY KEY,
                          accountNumber VARCHAR(255) NOT NULL,
                          balance DECIMAL(10, 2) NOT NULL,
                          customer_id INTEGER,
                          FOREIGN KEY (customer_id) REFERENCES customers(id) ON DELETE SET NULL
);

-- Create the transactions table
CREATE TABLE transactions (
                              id SERIAL PRIMARY KEY,
                              account_id INTEGER NOT NULL,
                              type VARCHAR(50) NOT NULL,
                              amount DECIMAL(10, 2) NOT NULL,
                              timestamp TIMESTAMP WITHOUT TIME ZONE DEFAULT NOW(),
                              FOREIGN KEY (account_id) REFERENCES accounts(id) ON DELETE CASCADE
);

-- Insert example data into customers
INSERT INTO customers (name, address, email) VALUES
                                                 ('Bruce Wayne', '123 Elm St', 'john.doe@email.com'),
                                                 ('Peter Parker', '456 Oak St', 'jane.smith@email.com');

-- Verify the schema
--SELECT * FROM customers;
--SELECT * FROM accounts;
--SELECT * FROM transactions;
