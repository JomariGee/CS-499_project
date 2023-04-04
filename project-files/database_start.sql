//cost: 
//0 = none
//1 = $
//2 = $$
//3 = $$$
//4 = $$$$

//impact:
//0 = "low"
//1 = "medium"
//2 = "high"


//complexity:
//0 = "low"
//1 = "medium"
//2 = "high"


// Status Table
create table Status (statusID int(11), status_desc varchar(255));
insert into Status (status_desc) values("Not Started"), ("Scoped"), ("In Progress"), ("Implemented");

------------------------------------------------------------------------------------

//Category Table
create table Category (categoryID int(11), category_desc varchar(255));
insert into Category (category_desc) values ("Account Security"), ("Device Security"), ("Data Security"), ("Governance and Training"), 
	("Vulnerability Management"), ("Supply Chain / Third Party"), ("Response and Recovery"), ("Other");

------------------------------------------------------------------------------------

//Goal Table
create table Goal (goalID int(11), goalTitle varchar(255), status_updateID int(11), cost int(11), impact int(11), complexity int(11), categoryID int(11));

insert into Goal (goalTitle, cost, impact, complexity, categoryID) values 
	("Detection of Unsuccessful (Automated) Login Attempts", 1, 1, 0, 0), 
	("Changing Default Passwords", 1, 1, 1, 0),
	("Multi-Factor Authentication (MFA)", 2, 2, 1, 0), 
	("Minimum Password Strength", 1, 2, 0, 0),
	("Separating User and Privileged Accounts", 1, 2, 0, 0),
	("Unique Credentials", 2, 1, 1, 0),
	("Revoking Credentials for Departing Employees", 1, 1, 0, 0), 
	
	("Hardware and Software Approval Process", 2, 2, 1, 1), 
	("Disable Macros by Default", 1, 1, 0, 1),
	("Asset Inventory", 2, 2, 1, 1), 
	("Prohibit Connection of Unauthorized Devices", 3, 2, 2, 1), 
	("Document Device Configurations", 2, 2, 1, 1), 
	
	("Log Collection", 2, 2, 1, 2), 
	("Secure Log Storage", 3, 2, 0, 2),
	("Strong and Agile Encryption", 2, 2, 1, 2), 
	("Secure Sensitive Data", 2, 2, 1, 2), 
	
	("Organizational Cybersecurity Leadership", 1, 2, 0, 3), 
	("OT Cybersecurity Leadership", 1, 2, 0, 3), 
	("Basic Cybersecurity Training", 1, 2, 0, 3), 
	("OT Cybersecurity Training", 1, 2, 0, 3), 
	("Improving IT and OT Cybersecurity Relationships", 1, 1, 0, 3), 
	
	("Mitigating Known Vulnerabilities", 1, 2, 1, 4), 
	("Vulnerability Disclosure/Reporting", 3, 0, 2, 4), 
	("Deploy Security.txt Files", 1, 2, 0, 4), 
	("No Exploitable Services on the Internet", 1, 2, 0, 4), 
	("Limit OT Connections to Public Internet", 3, 1, 1, 4), 
	("Third-Party Validation of Cybersecurity Control Effectiveness", 3, 2, 2, 4), 
	
	("Vendor/Supplier Cybersecurity Requirements", 1, 2, 0, 5), 
	("Supply Chain Incident Reporting", 1, 2, 0, 5), 
	("Supply Chain Vulnerability Disclosure", 1, 2, 0, 5), 
	
	(" Incident Reporting", 1, 2, 0, 6), 
	("Incident Response (IR) Plans", 1, 2, 0, 6), 
	("System Back Ups", 2, 2, 1, 6), 
	("Document Network Topology", 2, 1, 1, 6), 
	
	("Network Segmentation", 3, 2, 2, 7), 
	("Detecting Relevant Threats and TTPs", 3, 1, 2, 7), 
	("Email Security", 1, 1, 0, 7);

	
------------------------------------------------------------------------------------

// Risk Table
create table Risk (riskID int(11), risk_desc varchar(255), risk_link varchar(255), goalID int(11));

------------------------------------------------------------------------------------

// StatusUpdate Table
create table StatusUpdate (stat_updateID int(11), statusID int(11), goalID int(11), update_date date, noteID int(11), fileID int(11));

// fill inital status
for x < (# of goals +1){
	insert into StatusUpdate (statusID, goalID, update_date, noteID, fileID) values
		(0, x, current_date, NULL, NULL);
}

------------------------------------------------------------------------------------

// RecommendedAction Table
create table RecommendedAction (recActionID int(11), recAction_desc varchar(255), IT_desc varchar(255), OT_desc varchar(255));

------------------------------------------------------------------------------------

// References Table
create table References (referencesID int(11), ref_Title varchar(255), ref_purpose varchar(255), ref_link varchar(255));

------------------------------------------------------------------------------------

// Files Table
create table files (fileID int(11), fileLocation varchar(255), goalID int(11));

------------------------------------------------------------------------------------

// Notes Table
create table notes (noteID int(11), note_desc varchar(255), goalID int(11));

------------------------------------------------------------------------------------
