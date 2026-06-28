USE it_project_hub;

ALTER TABLE contacts
ADD COLUMN major VARCHAR(100) NOT NULL AFTER phone;