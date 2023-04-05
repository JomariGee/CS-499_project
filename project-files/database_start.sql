/*cost: 
0 = none
1 = $
2 = $$
3 = $$$
4 = $$$$ */

/*impact:
0 = "low"
1 = "medium"
2 = "high" */


/*complexity:
0 = "low"
1 = "medium"
2 = "high" */

/* Status Table*/
create table Status (statusID int(11), status_desc varchar(255));
insert into Status (status_desc) values("Not Started"), ("Scoped"), ("In Progress"), ("Implemented");

------------------------------------------------------------------------------------

/*Category Table*/
create table Category (categoryID int(11), category_desc varchar(255));
insert into Category (category_desc) values ("Account Security"), ("Device Security"), ("Data Security"), ("Governance and Training"), 
	("Vulnerability Management"), ("Supply Chain / Third Party"), ("Response and Recovery"), ("Other");

------------------------------------------------------------------------------------

/*Goal Table*/
create table Goal (goalID int(11), goalTitle varchar(255), status_updateID int(11), cost int(11), impact int(11), complexity int(11), categoryID int(11), csf varchar(255));

insert into Goal (goalTitle, cost, impact, complexity, categoryID, csf) values 
	("Detection of Unsuccessful (Automated) Login Attempts", 1, 1, 0, 0, "PR.AC-7"), 
	("Changing Default Passwords", 1, 1, 1, 0, "PR.AC-1"),
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

/* Risk Table*/
create table Risk (riskID int(11), risk_desc varchar(255), risk_link varchar(255), goalID int(11));
insert into Risk (risk_desc, goalID) values
		("Brute Force - Password Guessing (T1110.001)", 0), 
		("Brute Force - Password Cracking (T1110.002)", 0), 
		("Brute Force - Password Spraying (T1110.003)", 0), 
		("Brute Force - Credential Stuffing (T1110.004)", 0);
		();

------------------------------------------------------------------------------------

/* StatusUpdate Table*/
create table StatusUpdate (stat_updateID int(11), statusID int(11), goalID int(11), update_date date, noteID int(11), fileID int(11));

/* fill inital status*/
for x < (# of goals +1){
	insert into StatusUpdate (statusID, goalID, update_date, noteID, fileID) values
		(0, x, current_date, NULL, NULL);
}

------------------------------------------------------------------------------------

/* RecommendedAction Table*/
create table RecommendedAction (recActionID int(11), recAction_desc varchar(255), IT_desc varchar(255), OT_desc varchar(255));
insert into RecommendedAction (recAction_desc, IT_desc, OT_desc) values
/*ACCOUNT SECURITY (1.0)*/
	(0, "All unsuccessful logins are logged and sent to an organization’s security team or relevant logging system. Security teams are notified (e.g., by an alert) after a specific number of consecutive, unsuccessful login attempts in a short period (e.g., 5 failed attempts over 2 minutes). This alert is logged and stored in the relevant security or ticketing system for retroactive analysis.",
		"For IT assets, there is a system-enforced policy that prevents future logins for the suspicious account. For example, this could be for some minimum time, or until the account is re-enabled by a privileged user. This configuration is enabled when available on an asset. For example, Windows 11 can automatically lock out accounts for 10 minutes after 10 incorrect logins over a 10 minute period.", 
	 	NULL), 
	(1, "An enforced organization-wide policy and/or process that requires changing default manufacturer passwords for any/all hardware, software, and firmware before being put on any internal or external network. This includes IT assets for OT, such as OT administration web pages. 
	 In instances where changing default passwords is not feasible (e.g., a control system with a hard-coded password), implement and document appropriate compensating security controls, and monitor logs for network traffic and login attempts on those devices.", 
		NULL, 
	 	"While changing default passwords on an organization’s existing OT requires significantly more work, we still recommend having such a policy to change default credentials for all new or future devices. This is not only easier to achieve, but also reduces potential risk in the future if adversary TTPs change.")
	(2, "Hardware-based MFA is enabled when available; if not, then soft tokens (such as via mobile app) should be used; MFA via SMS should only be used when no other options are possible.", 
		"IT accounts leverage multi-factor authentication to access organizational resources.", 
		"Within OT environments, MFA is enabled on all accounts and systems that can be accessed remotely, including vendor/maintenance accounts, remotely accessible user and engineering workstations, and remotely accessible Human Machine Interfaces (HMIs)."),
	(3, "Organizations have a system-enforced policy that requires a minimum password length of 15* or more characters for all password protected IT assets, and all OT assets where technically possible.** Organizations should consider leveraging passphrases and password managers to make it easier for users to maintain sufficiently long passwords. In instances where minimum password lengths are not technically feasible, compensating controls are applied and recorded, and all login attempts to those assets are logged. Assets that cannot support passwords of sufficient strength length are prioritized for upgrade or replacement. 
	 This goal is particularly important for organizations that lack widespread implementation of MFA and capabilities to protect against brute-force attacks (such as Web Application Firewalls and third-party Content Delivery Networks) or are unable to adopt passwordless authentication methods. 
	* Modern attacker tools can crack 8 character passwords quickly. Length is a more impactful and important factor in password strength than complexity or frequent password rotations, and makes it easier for humans to create and remember passwords.", 
	 	NULL,
	 	"** OT assets that use a central authentication mechanism (such as Active Directory) are most important to address. Examples of low-risk OT assets that may not be technically feasible include those in remote locations, such as those on offshore rigs or on top of wind turbines."), 
	(4, "No user accounts always have administrator or super-user privileges. Administrators maintain separate user accounts for all actions and activities not associated with the administrator role (e.g. for business email, web browsing, etc.). Privileges are revaluated on a recurring basis to validate continued need for a given set of permissions.", 
	 	NULL, 
	 	NULL), 
	(5, "Organizations provision unique and separate credentials for similar services and asset access on IT and OT networks. Users do not (or cannot) reuse passwords for accounts, applications, services, etc. Service accounts/machine accounts have unique passwords from all member user accounts.", 
	 	NULL, 
	 	NULL), 
	(6, "A defined and enforced administrative process applied to all departing employees by the day of their departure that (1) revokes and securely return all physical badges, key cards, tokens, etc., and (2) disables all user accounts and access to organizational resources.", 
	 	NULL, 
	 	NULL), 
/*DEVICE SECURITY (2.0)*/
	(7, "Implement an administrative policy or automated process that requires approval before new hardware, firmware, or software/ software version is installed or deployed. Organizations maintain a risk-informed allowlist of approved hardware, firmware, and software, to include specification of approved versions, when technically feasible. For OT assets specifically, these actions should also be aligned with defined change control and testing activities.", 
	 	NULL, 
	 	NULL), 
	(8, "A system-enforced policy that disables Microsoft Office macros, or similar embedded code, by default on all devices. If macros must be enabled in specific circumstances, there is a policy for authorized users to request that macros are enabled on specific assets.", 
	 	NULL, 
	 	NULL), 
	(9, "Maintain a regularly updated inventory of all organizational assets with an IP address (including IPv6), including OT. This inventory is updated on a recurring basis, no less than monthly for both IT and OT", 
	 	NULL, 
	 	NULL), 
	(10, "Organizations maintain policies and processes to ensure that unauthorized media and hardware are not connected to IT and OT assets, such as by limiting use of USB devices and removable media or disabling AutoRun.", 
	 	NULL, 
	 	"When feasible, establish procedures to remove, disable, or otherwise secure physical ports to prevent the connection of unauthorized devices, or establish procedures for granting access through approved exceptions."), 
	(11, "Organizations maintain policies and processes to ensure that unauthorized media and hardware are not connected to IT and OT assets, such as by limiting use of USB devices and removable media or disabling AutoRun.", 
	 	NULL, 
	 	"When feasible, establish procedures to remove, disable, or otherwise secure physical ports to prevent the connection of unauthorized devices, or establish procedures for granting access through approved exceptions."),
/*DATA SECURITY (3.0)*/
	(12, "Access and security focused (e.g., IDS/IDPS, firewall, DLP, VPN) logs are collected and stored for use in both detection and incident response activities (e.g. forensics). Security teams are notified when a critical log source is disabled, such as Windows Event Logging.", 
	 	NULL, 
	 	"For OT assets where logs are non-standard or not available, network traffic and communications to and from log-less assets is collected."),
	(13, "Logs are stored in a central system, such as a Security Information and Event Management (SIEM) tool or central database, and can only be accessed or modified by authorized and authenticated users. Logs are stored for a duration informed by risk or pertinent regulatory guidelines.", 
	 	NULL, 
	 	NULL), 
	(14, "Properly configured and up-to-date transport layer security (TLS) is utilized to protect data in transit where technically feasible. Organizations should also plan for identifying any use of outdated or weak encryption and updating to sufficiently strong algorithms, and consideration for managing the implications of post-quantum cryptography.",
	 	NULL, 
	 	"To minimize the impact to latency and availability; encryption is used where feasible, usually for OT communications connecting with remote/external assets."), 
	(15, "Sensitive data, including credentials, are not stored in plaintext anywhere in the organization, and can only be accessed by authenticated and authorized users. Credentials are stored in a secure manner, such as with a credential/password manager or vault, or other privileged account management solution.", 
	 	NULL, 
	 	NULL), 
/*GOVERNANCE AND TRAINING (4.0)*/
	(16, "A named role/position/title is identified as responsible and accountable for planning, resourcing, and execution of cybersecurity activities. This role may undertake activities such as managing cybersecurity operations at the senior level, requesting and securing budget resources, or leading strategy development to inform future positioning.", 
	 	NULL, 
	 	NULL), 
	(17, "A named role/position/title is identified as responsible and accountable for planning, resourcing, and execution of OTspecific cybersecurity activities. In some organizations this may be the same position as identified in Organizational Cybersecurity Leadership.", 
	 	NULL, 
	 	NULL), 
	(18, "At least annual trainings for all organizational employees and contractors that covers basic security concepts, such as phishing, business email compromise, basic operational security (OPSEC), password security, etc., as well as fostering an internal culture of security and cyber awareness.
	 New employees receive initial cybersecurity training within 10 days of onboarding, and recurring training on at least an annual basis", 
	 	NULL, 
	 	NULL), 
	(19, "In addition to basic cybersecurity training, personnel who maintain or secure OT as part of their regular duties receive OT-specific cybersecurity training on at least an annual basis.", 
	 	NULL, 
	 	NULL, 
	 (20, "Organizations sponsor at least one ‘pizza party’ or equivalent social gathering per year that is focused on strengthening working relationships between IT and OT security personnel, and is not a working event (such as providing meals during an incident response).", 
	  	NULL,
	  	NULL),
/*VULNERABILITY MANAGEMENT (5.0)*/	 
	 (21, "All known exploited vulnerabilities (listed in CISA’s KEV catalog - https://www.cisa.gov/known-exploited-vulnerabilities-catalog) in internet-facing systems are patched or otherwise mitigated within a riskinformed span of time, prioritizing more critical assets first.", 
	  	NULL, 
	  	"For assets where patching is either not possible or may substantially compromise availability or safety, compensating controls are applied (e.g. segmentation, monitoring) and recorded. Sufficient controls either make the asset inaccessible from the public internet, or reduce the ability of adversaries to exploit the vulnerabilities in these assets."), 
	 (22, "Consistent with NIST SP 800-53 Revision 5, organizations maintain a public, easily-discoverable method for security researchers to notify (e.g. via email address or web form) organizations’ security teams of vulnerable, mis-configured, or otherwise exploitable assets. Valid submissions are acknowledged and responded to in a timely manner, taking into account the completeness and complexity of the vulnerability. Validated and exploitable weaknesses are mitigated consistent with their severity.
	Security researchers sharing vulnerabilities discovered in good faith are protected under Safe Harbor rules.
	In instances where vulnerabilities are validated and disclosed, public acknowledgement is given to the researcher who originally submitted the notification", 
	  	NULL, 
	  	NULL), 
	 (23, "All public-facing web domains have a security.txt file that conforms to the recommendations in RFC 9116.", 
	  	NULL, 
	  	NULL), 
	 (24, "Assets on the public internet expose no exploitable services, such as RDP. Where these services must be exposed, appropriate compensating controls are implemented to prevent common forms of abuse and exploitation. All unnecessary OS applications and network protocols are disabled on internet-facing assets.", 
	  	NULL, 
	  	NULL), 
	 (25, "No OT assets are on the public internet, unless explicitly required for operation. Exceptions must be justified and documented, and excepted assets must have additional protections in place to prevent and detect exploitation attempts (such as logging, MFA, mandatory access via proxy or other intermediary, etc.).", 
	  	NULL, 
	  	NULL), 
	 (26, "Third-parties with demonstrated expertise in (IT and/or OT) cybersecurity regularly validate the effectiveness and coverage of an organization’s cybersecurity defenses. These exercises, which may include penetration tests, bug bounties, incident simulations, or table-top exercises, should include both unannounced and announced tests.
	 Exercises consider both the ability and impact of a potential adversary to infiltrate the network from the outside, as well as the ability of an adversary within the network (e.g., “assume breach”) to pivot laterally to demonstrate potential impact on critical (including OT/ICS) systems.
	 High-impact findings from previous tests are mitigated in a timely manner and are not re-observed in future tests.", 
		NULL, 
	  	NULL), 
/*SUPPLY CHAIN / THIRD PARTY (6.0)*/	 
	 (27, "Organizations’ procurement documents include cybersecurity requirements and questions, which are evaluated in vendor selection such that, given two offerings of roughly similar cost and function, the more secure offering and/or supplier is preferred. ", 
	  	NULL, 
	  	NULL), 
	 (28, "Procurement documents and contracts, such as Service Level Agreements (SLAs), stipulate that vendors and/or service providers notify the procuring customer of security incidents within a riskinformed timeframe as determined by the organization.", 
	  	NULL, 
	  	NULL), 
	 (29, "Procurement documents and contracts, such as Service Level Agreements (SLAs), stipulate that vendors and/or service providers notify the procuring customer of confirmed security vulnerabilities in their assets within a risk-informed timeframe as determined by the organization.", 
	  	NULL, 
	  	NULL), 
/* Response and Recovery */
	 (30, " Organizations maintain codified policy and procedures on to whom and how to report all confirmed cybersecurity incidents to appropriate external entities (e.g. state/federal regulators or SRMA’s as required, ISAC/ISAO, as well as CISA).
	Known incidents are reported to CISA as well as other necessary parties within timeframes directed by applicable regulatory guidance or in the absence of guidance, as soon as safely capable. This goal will be revisited following full implementation of the Cyber Incident Reporting for Critical Infrastructure Act of 2022 (CIRCIA). ", 
	  	NULL, 
	  	NULL), 
	 (31, "", 
	  	N,)
	
	
	,();

------------------------------------------------------------------------------------

/* References Table*/
create table References (referencesID int(11), ref_Title varchar(255), ref_purpose varchar(255), ref_link varchar(255));

------------------------------------------------------------------------------------

/* Files Table*/
create table files (fileID int(11), fileLocation varchar(255), goalID int(11));

------------------------------------------------------------------------------------

/* Notes Table */
create table notes (noteID int(11), note_desc varchar(255), goalID int(11));

------------------------------------------------------------------------------------
