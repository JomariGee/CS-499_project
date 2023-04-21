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

/* Database Creation */
CREATE DATABASE CPG;

USE CPG;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--
CREATE TABLE `status` (
  `statusID` int(11) NOT NULL AUTO_INCREMENT,
  `status_desc` varchar(255) DEFAULT NULL, 
  PRIMARY KEY (statusID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

insert into status (status_desc) values("Not Started"), ("Scoped"), ("In Progress"), ("Implemented");

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryID` int(11) NOT NULL AUTO_INCREMENT,
  `category_desc` varchar(255) DEFAULT NULL, 
  PRIMARY KEY (categoryID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

insert into category (category_desc) values ("Account Security"), ("Device Security"), ("Data Security"), ("Governance and Training"), 
	("Vulnerability Management"), ("Supply Chain / Third Party"), ("Response and Recovery"), ("Other");

-- --------------------------------------------------------

--
-- Table structure for table `goal`
--

CREATE TABLE `goal` (
  `goalID` int(11) NOT NULL AUTO_INCREMENT,
  `goalTitle` varchar(255) DEFAULT NULL,
  `status_updateID` int(11) DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `impact` int(11) DEFAULT NULL,
  `complexity` int(11) DEFAULT NULL,
  `categoryID` int(11) DEFAULT NULL,
  `csf` varchar(255) DEFAULT NULL,
  `assessment_date` varchar(50) DEFAULT NULL, 
  PRIMARY KEY (goalID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

insert into goal (goalTitle, cost, impact, complexity, categoryID, csf, status_updateID) values 
CREATE TABLE `goal` (
  `goalID` int(11) NOT NULL AUTO_INCREMENT,
  `goalTitle` varchar(255) DEFAULT NULL,
  `status_updateID` int(11) DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `impact` int(11) DEFAULT NULL,
  `complexity` int(11) DEFAULT NULL,
  `categoryID` int(11) DEFAULT NULL,
  `csf` varchar(255) DEFAULT NULL,
  `assessment_date` varchar(50) DEFAULT NULL, 
  PRIMARY KEY (goalID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

insert into goal (goalTitle, cost, impact, complexity, categoryID, csf, status_updateID) values 
/*ACCOUNT SECURITY (1.0) -- checked*/
	("Detection of Unsuccessful (Automated) Login Attempts", 1, 3, 1, 1, "PR.AC-7", 1), 
	("Changing Default Passwords", 1, 3, 2, 1, "PR.AC-1", 1),
	("Multi-Factor Authentication (MFA)", 2, 3, 2, 1, "PR.AC-7", 1), 
	("Minimum Password Strength", 1, 3, 1, 1, "PR.AC-1", 1),
	("Separating User and Privileged Accounts", 1, 3, 1, 1, "PR.AC-4", 1),
	("Unique Credentials", 2, 2, 2, 1, "PR.AC-1", 1),
	("Revoking Credentials for Departing Employees", 1, 2, 1, 1, "PR.AC-1", 1), 
	
/*DEVICE SECURITY (2.0) -- checked*/ 
	("Hardware and Software Approval Process", 2, 3, 2, 2, "PR.IP-3", 1), 
	("Disable Macros by Default", 1, 2, 1, 2, "PR.IP-1, PR.IP-3", 1),
	("Asset Inventory", 2, 3, 2, 2, "ID.AM-1", 1), 
	("Prohibit Connection of Unauthorized Devices", 3, 3, 3, 2, "PR.PT-2", 1), 
	("Document Device Configurations", 2, 3, 2, 2, "PR.IP-1", 1), 
	
/*DATA SECURITY (3.0) -- checked*/
	("Log Collection", 2, 3, 2, 3, "PR.PT-1", 1), 
	("Secure Log Storage", 3, 3, 1, 3, "PR.PT-1", 1),
	("Strong and Agile Encryption", 2, 3, 2, 3, "PR.DS-1, PR.DS-2", 1), 
	("Secure Sensitive Data", 2, 3, 2, 3, "PR.DS-1, PR.DS-2, PR.DS-5", 1), 
	
/*GOVERNANCE AND TRAINING (4.0) -- checked*/
	("Organizational Cybersecurity Leadership", 1, 3, 1, 4, "ID.GV-1, ID.GV-2", 1), 
	("OT Cybersecurity Leadership", 1, 3, 1, 4, "ID.GV-1, ID.GV-2", 1), 
	("Basic Cybersecurity Training", 1, 3, 1, 4, "PR.AT-1", 1), 
	("OT Cybersecurity Training", 1, 3, 1, 4, "PR.AT-2, PR.AT-3, PR.AT-5", 1), 
	("Improving IT and OT Cybersecurity Relationships", 1, 2, 1, 4, "ID.GV-2", 1), 
	
/*VULNERABILITY MANAGEMENT (5.0) -- checked*/
	("Mitigating Known Vulnerabilities", 1, 3, 2, 5, "PR.IP-12, ID.RA-1, DE.CM-8, RS.MI-3", 1), 
	("Vulnerability Disclosure/Reporting", 3, 1, 3, 5, "RS.AN-5", 1), 
	("Deploy Security.txt Files", 1, 3, 1, 5, "RS.AN-5", 1), 
	("No Exploitable Services on the Internet", 1, 3, 1, 5, "PR.PT-4", 1), 
	("Limit OT Connections to Public Internet", 3, 2, 2, 5, "PR.PT-4", 1), 
	("Third-Party Validation of Cybersecurity Control Effectiveness", 3, 3, 3, 5, "ID.RA-1, ID.RA-3", 1), 
	
/*SUPPLY CHAIN / THIRD PARTY (6.0) -- checked*/
	("Vendor/Supplier Cybersecurity Requirements", 1, 3, 1, 6, "ID.SC-3", 1), 
	("Supply Chain Incident Reporting", 1, 3, 1, 6, "ID.SC-1, ID.SC-3", 1), 
	("Supply Chain Vulnerability Disclosure", 1, 3, 1, 6, "ID.SC-1, ID.SC-3", 1), 
	
/* Response and Recovery -- checked*/
	(" Incident Reporting", 1, 3, 1, 7, "RS.CO-2, RS.CO-4", 1), 
	("Incident Response (IR) Plans", 1, 3, 1, 7, "PR.IP-9, PR.IP-10", 1), 
	("System Back Ups", 2, 3, 2, 7, "PR.IP-4", 1), 
	("Document Network Topology", 2, 2, 2, 7, "PR.IP-1", 1), 
	
/*Other (8.0) -- checked*/
	("Network Segmentation", 3, 3, 3, 8, "PR.AC-5, PR.PT-4, DE.CM-1", 1), 
	("Detecting Relevant Threats and TTPs", 3, 2, 3, 8, "ID.RA-3, DE.CM-1", 1), 
	("Email Security", 1, 2, 1, 8, "PR.DS-1, PR.DS-2, PR.DS-5", 1);

-- --------------------------------------------------------

--
-- Table structure for table `goal_risk`
--

CREATE TABLE `goal_risk` (
  `goalRiskID` int(10) NOT NULL AUTO_INCREMENT,
  `riskID` int(10) DEFAULT NULL,
  `goalID` int(10) DEFAULT NULL, 
  PRIMARY KEY (goalRiskID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

insert into goal_risk (goalID, riskID) values
/*ACCOUNT SECURITY (1.0)*/
		(1, 1), 
		(1, 2), 
		(1, 3), 
		(1, 4), 
		(2, 6), 
		(2, 7), 
		(3, 5), 
		(3, 9), 
		(3, 10), 
		(3, 7),
		(3, 11),
		(4, 1),
		(4, 2), 
		(4, 3), 
		(4, 4), 
		(5, 8), 
		(6, 8), 
		(6, 1), 
		(7, 8), 
/*DEVICE SECURITY (2.0)*/		
		(8, 12), 
		(8, 13), 
		(8, 14), 
		(8, 15), 
		(9, 16), 
		(9, 17), 
		(10, 13), 
		(10, 18), 
		(10, 19), 
		(11, 13), 
		(11, 20), 
		(12, 21), 
/*DATA SECURITY (3.0)*/
		(13, 22), 
		(13, 23), 
		(14, 24), 
		(14, 25), 
		(14, 26), 
		(14, 27), 
		(15, 28), 
		(15, 29), 
		(15, 30), 
		(15, 31), 
		(15, 32), 
		(16, 33), 
		(16, 34), 
		(16, 35), 
		(16, 36), 
		(16, 37), 
/*GOVERNANCE AND TRAINING (4.0)*/
		(17, 38), 
		(18, 38), 
		(19, 40), 
		(20, 40), 
		(21, 41), 
/*VULNERABILITY MANAGEMENT (5.0)*/
		(22, 43), 
		(22, 18),
		(22, 42),
		(22, 12), 
		(22, 11),
		(23, 43), 
		(23, 18), 
		(23, 42), 
		(23, 12), 
		(24, 43), 
		(24, 18), 
		(24, 42), 
		(24, 12), 
		(25, 43), 
		(25, 18), 
		(25, 42), 
		(25, 11), 
		(25, 9), 
		(26, 43), 
		(26, 18), 
		(26, 42), 
		(26, 11), 
		(27, 44), 
/*SUPPLY CHAIN / THIRD PARTY (6.0)*/
		(28, 12), 
		(29, 12), 
		(30, 12), 
/* Response and Recovery */
		(31, 45), 
		(32, 46),
		(33, 47), 
		(33, 48), 
		(33, 49), 
		(33, 50), 
		(33, 51), 
		(33, 52), 
		(33, 53), 
		(33, 54), 
		(34, 55), 
/*Other (8.0)*/
		(35, 56), 
		(35, 57), 
		(35, 58), 
		(35, 30), 
		(36, 59), 
		(37, 60), 
		(37, 61);

-- --------------------------------------------------------

--
-- Table structure for table `risk`
--

CREATE TABLE `risk` (
  `riskID` int(11) NOT NULL AUTO_INCREMENT,
  `risk_desc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (riskID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

insert into risk (risk_desc) values
		("Brute Force - Password Guessing (T1110.001)"), 
		("Brute Force - Password Cracking (T1110.002)"), 
		("Brute Force - Password Spraying (T1110.003)"), 
		("Brute Force - Credential Stuffing (T1110.004)"),
		("Brute Force (T1110)"), 
		
	/*5*/	("Valid Accounts - Default Accounts (T1078.001)"), 
		("Valid Accounts (ICS T0859)"), 
		("Valid Accounts (T1078, ICS T0859)"),
		("Remote Services - Remote Desktop Protocol (T1021.001)"), 
		("Remote Services - SSH (T1021.004)"), 
		
	/*10*/	("External Remote Services (ICS T0822)"),
		("Supply Chain Compromise (T1195, ICS T0862)"), 
		("Hardware Additions (T1200)"), 
		("Browser Extensions (T1176)"), 
		("Transient Cyber Asset (ICS T0864)"), 
	/*15*/	("Phishing - Spearphishing Attachment (T1566.001)"), 
		("User Execution - Malicious FIle (T1204.002)"), 
		("Exploit Public-Facing Application (T0819, ICS T0819)"), 
		("Internet Accessible Device (ICS T0883)"), 
		("Replication Through Removable Media (T1091, ICS T0847)"), 
		 
	/*20*/  ("Delayed, insufficient, or incomplete ability to maintain or restore functionality of critical devices and service operations."), 
		("Delayed, insufficient, or incomplete ability to detect and respond to potential cyber incidents."), 
		("Impair Defenses (T1562)"), 
		("Indicator Removal on Host - Clear Windows Event Logs (T1070.001)"), 
		("Indicator Removal on Host - Clear Linux or Mac System Logs (T1070.002)"), 
		 
	/*25*/	("Indicator Removal on Host - File Deletion (T1070.004)"), 
		("Indicator Removal on Host (ICS T0872)"), 
		("Adversary-in-the-Middle (T1557)"), 
		("Automated Collection (T1119)"), 
		("Network Sniffing (T1040, ICS T0842)"), 
		("Wireless Compromise (ICS T0860)"), 
		("Wireness Sniffing (ICS T0887)"), 
		("Unsecured Credentials (T1552)"), 
		("Steal or Forge Kerberos Tickets (T1558)"), 
		("OS Credential Dumping (T1003)"), 
		("Data from Information Repositories (ICS T0811)"), 
		("Theft of Operational Information (T0882)"), 
		("Lack of sufficient cybersecurity accountability, investment, or effectiveness."), 
		("Lack of accountability, investment, or effectiveness of OT cybersecurity program."), 
		("User Training (M1017, ICS M0917)"), 
		("Poor working relationships and a lack of mutual understanding between IT and OT cybersecurity can often result in increased risk for OT cybersecurity."), 
		("Exploitation of Remote Service (T1210, ICS T0866)"), 
		("Active Scanning - Vulnerability Scanning (T1595.002)"), 
		("Reduce risk of gaps in cyber defenses or a false sense of security in existing protections."), 
		("Without timely incident reporting, CISA and other groups are less able to assist affected organizations, and lack critical information into the broader threat landscape (such as whether a broader attack is occurring against a specific sector)."), 
		("Inability to quickly and effectively contain, mitigate, and communicate about cybersecurity incidents"), 
		("Data Destruction (T1485, ICS T0809)"), 
		("Data Encrypted for Impact (T1486)"), 
		("Disk Wipe (T1561)"), 
		("Inhibit System Recovery (T1490)"), 
		("Denial of Control (ICS T0813)"), 
		("Denial/Loss of View (ICS T0815, T0829)"), 
		("Loss of Availability (T0826)"), 
		("Loss/Manipulation of Control (T0828, T0831)"), 
		("Incomplete or inaccurate understanding of network topology inhibits effective incident response and recovery"), 
		("Network Service Discovery (T1046)"), 
		("Trusted Relationship (T1199)"), 
		("Network Connection Enumeration (ICS T0840)"), 
		("Without the knowledge of relevant threats and ability to detect them, organizations risk adversaries existing in their networks undetected for long periods."), 
		("Phishing (T1566)"), 
		("Business Email Compromise");

-- --------------------------------------------------------

--
-- Table structure for table `status_update`
--

CREATE TABLE `status_update` (
  `stat_updateID` int(11) NOT NULL AUTO_INCREMENT,
  `statusID` int(11) DEFAULT NULL, 
  `goalID` int(11) DEFAULT NULL,
  `update_date` date DEFAULT NULL,
  PRIMARY KEY (stat_updateID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

insert into status_update (goalID, statusID, update_date) values 
/*ACCOUNT SECURITY (1.0) [1-7]*/
	 (1, 0, "Default"), 
	 (2, 0, "Default"),
	 (3, 0, "Default"), 
	 (4, 0, "Default"),
	 (5, 0, "Default"), 
	 (6, 0, "Default"), 
	 (7, 0, "Default"), 
/*DEVICE SECURITY (2.0) [8-12]*/
	 (8, 0, "Default"), 
	 (9, 0, "Default"), 
	 (10, 0, "Default"), 
	 (11, 0, "Default"), 
	 (12, 0, "Default"), 
/*DATA SECURITY (3.0) [13-16]*/
	 (13, 0, "Default"), 
	 (14, 0, "Default"), 
	 (15, 0, "Default"),
	 (16, 0, "Default"),  
/*GOVERNANCE AND TRAINING (4.0) [17-21]*/
	 (17, 0, "Default"), 
	 (18, 0, "Default"), 
	 (19, 0, "Default"), 
	 (20, 0, "Default"), 
	 (21, 0, "Default"), 
/*VULNERABILITY MANAGEMENT (5.0) [22-27]*/
	 (22, 0, "Default"), 
	 (23, 0, "Default"), 
	 (24, 0, "Default"), 
	 (25, 0, "Default"), 
	 (26, 0, "Default"), 
	 (27, 0, "Default"), 
/*SUPPLY CHAIN / THIRD PARTY (6.0) [28-30]*/	
	 (28, 0, "Default"), 
	 (29, 0, "Default"), 
	 (30, 0, "Default"), 
/* Response and Recovery (7.0) [31-34]*/
	 (31, 0, "Default"), 
	 (32, 0, "Default"), 
	 (33, 0, "Default"), 
	 (34, 0, "Default"), 
/*Other (8.0) [35-37]*/
	 (35, 0, "Default"), 
	 (36, 0, "Default"), 
	 (37, 0, "Default");
	
/* RecommendedAction Table*/
/*create table RecommendedAction (recActionID int(11), goalID int(11), recAction_desc varchar(255), IT_desc varchar(255), OT_desc varchar(255));*/
CREATE TABLE `recommendedaction` (
  `recActionID` int(11) NOT NULL AUTO_INCREMENT,
  `goalID` int(11) DEFAULT NULL, 
  `recAction_desc` varchar(1500) DEFAULT NULL,
  `IT_desc` varchar(500) DEFAULT NULL,
  `OT_desc` varchar(500) DEFAULT NULL, 
  PRIMARY KEY (recActionID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

insert into recommendedaction (goalID, recAction_desc, IT_desc, OT_desc) values
/*ACCOUNT SECURITY (1.0)*/
	(1, "All unsuccessful logins are logged and sent to an organization’s security team or relevant logging system. Security teams are notified (e.g., by an alert) after a specific number of consecutive, unsuccessful login attempts in a short period (e.g., 5 failed attempts over 2 minutes). This alert is logged and stored in the relevant security or ticketing system for retroactive analysis.",
		"For IT assets, there is a system-enforced policy that prevents future logins for the suspicious account. For example, this could be for some minimum time, or until the account is re-enabled by a privileged user. This configuration is enabled when available on an asset. For example, Windows 11 can automatically lock out accounts for 10 minutes after 10 incorrect logins over a 10 minute period.", 
	 	NULL), 
	(2, "An enforced organization-wide policy and/or process that requires changing default manufacturer passwords for any/all hardware, software, and firmware before being put on any internal or external network. This includes IT assets for OT, such as OT administration web pages. 
	 In instances where changing default passwords is not feasible (e.g., a control system with a hard-coded password), implement and document appropriate compensating security controls, and monitor logs for network traffic and login attempts on those devices.", 
		NULL, 
	 	"While changing default passwords on an organization’s existing OT requires significantly more work, we still recommend having such a policy to change default credentials for all new or future devices. This is not only easier to achieve, but also reduces potential risk in the future if adversary TTPs change."), 
	(3, "Hardware-based MFA is enabled when available; if not, then soft tokens (such as via mobile app) should be used; MFA via SMS should only be used when no other options are possible.", 
		"IT accounts leverage multi-factor authentication to access organizational resources.", 
		"Within OT environments, MFA is enabled on all accounts and systems that can be accessed remotely, including vendor/maintenance accounts, remotely accessible user and engineering workstations, and remotely accessible Human Machine Interfaces (HMIs)."),
	(4, "Organizations have a system-enforced policy that requires a minimum password length of 15* or more characters for all password protected IT assets, and all OT assets where technically possible.** Organizations should consider leveraging passphrases and password managers to make it easier for users to maintain sufficiently long passwords. In instances where minimum password lengths are not technically feasible, compensating controls are applied and recorded, and all login attempts to those assets are logged. Assets that cannot support passwords of sufficient strength length are prioritized for upgrade or replacement.  This goal is particularly important for organizations that lack widespread implementation of MFA and capabilities to protect against brute-force attacks (such as Web Application Firewalls and third-party Content Delivery Networks) or are unable to adopt passwordless authentication methods.  * Modern attacker tools can crack 8 character passwords quickly. Length is a more impactful and important factor in password strength than complexity or frequent password rotations, and makes it easier for humans to create and remember passwords.", 
	 	NULL,
	 	"** OT assets that use a central authentication mechanism (such as Active Directory) are most important to address. Examples of low-risk OT assets that may not be technically feasible include those in remote locations, such as those on offshore rigs or on top of wind turbines."), 
	(5, "No user accounts always have administrator or super-user privileges. Administrators maintain separate user accounts for all actions and activities not associated with the administrator role (e.g. for business email, web browsing, etc.). Privileges are revaluated on a recurring basis to validate continued need for a given set of permissions.", 
	 	NULL, 
	 	NULL), 
	(6, "Organizations provision unique and separate credentials for similar services and asset access on IT and OT networks. Users do not (or cannot) reuse passwords for accounts, applications, services, etc. Service accounts/machine accounts have unique passwords from all member user accounts.", 
	 	NULL, 
	 	NULL), 
	(7, "A defined and enforced administrative process applied to all departing employees by the day of their departure that (1) revokes and securely return all physical badges, key cards, tokens, etc., and (2) disables all user accounts and access to organizational resources.", 
	 	NULL, 
	 	NULL), 
/*DEVICE SECURITY (2.0)*/
	(8, "Implement an administrative policy or automated process that requires approval before new hardware, firmware, or software/ software version is installed or deployed. Organizations maintain a risk-informed allowlist of approved hardware, firmware, and software, to include specification of approved versions, when technically feasible. For OT assets specifically, these actions should also be aligned with defined change control and testing activities.", 
	 	NULL, 
	 	NULL), 
	(9, "A system-enforced policy that disables Microsoft Office macros, or similar embedded code, by default on all devices. If macros must be enabled in specific circumstances, there is a policy for authorized users to request that macros are enabled on specific assets.", 
	 	NULL, 
	 	NULL), 
	(10, "Maintain a regularly updated inventory of all organizational assets with an IP address (including IPv6), including OT. This inventory is updated on a recurring basis, no less than monthly for both IT and OT", 
	 	NULL, 
	 	NULL), 
	(11, "Organizations maintain policies and processes to ensure that unauthorized media and hardware are not connected to IT and OT assets, such as by limiting use of USB devices and removable media or disabling AutoRun.", 
	 	NULL, 
	 	"When feasible, establish procedures to remove, disable, or otherwise secure physical ports to prevent the connection of unauthorized devices, or establish procedures for granting access through approved exceptions."), 
	(12, "Organizations maintain policies and processes to ensure that unauthorized media and hardware are not connected to IT and OT assets, such as by limiting use of USB devices and removable media or disabling AutoRun.", 
	 	NULL, 
	 	"When feasible, establish procedures to remove, disable, or otherwise secure physical ports to prevent the connection of unauthorized devices, or establish procedures for granting access through approved exceptions."),
/*DATA SECURITY (3.0)*/
	(13, "Access and security focused (e.g., IDS/IDPS, firewall, DLP, VPN) logs are collected and stored for use in both detection and incident response activities (e.g. forensics). Security teams are notified when a critical log source is disabled, such as Windows Event Logging.", 
	 	NULL, 
	 	"For OT assets where logs are non-standard or not available, network traffic and communications to and from log-less assets is collected."),
	(14, "Logs are stored in a central system, such as a Security Information and Event Management (SIEM) tool or central database, and can only be accessed or modified by authorized and authenticated users. Logs are stored for a duration informed by risk or pertinent regulatory guidelines.", 
	 	NULL, 
	 	NULL), 
	(15, "Properly configured and up-to-date transport layer security (TLS) is utilized to protect data in transit where technically feasible. Organizations should also plan for identifying any use of outdated or weak encryption and updating to sufficiently strong algorithms, and consideration for managing the implications of post-quantum cryptography.",
	 	NULL, 
	 	"To minimize the impact to latency and availability; encryption is used where feasible, usually for OT communications connecting with remote/external assets."), 
	(16, "Sensitive data, including credentials, are not stored in plaintext anywhere in the organization, and can only be accessed by authenticated and authorized users. Credentials are stored in a secure manner, such as with a credential/password manager or vault, or other privileged account management solution.", 
	 	NULL, 
	 	NULL), 
/*GOVERNANCE AND TRAINING (4.0)*/
	(17, "A named role/position/title is identified as responsible and accountable for planning, resourcing, and execution of cybersecurity activities. This role may undertake activities such as managing cybersecurity operations at the senior level, requesting and securing budget resources, or leading strategy development to inform future positioning.", 
	 	NULL, 
	 	NULL), 
	(18, "A named role/position/title is identified as responsible and accountable for planning, resourcing, and execution of OTspecific cybersecurity activities. In some organizations this may be the same position as identified in Organizational Cybersecurity Leadership.", 
	 	NULL, 
	 	NULL), 
	(19, 'At least annual trainings for all organizational employees and contractors that covers basic security concepts, such as phishing, business email compromise, basic operational security (OPSEC), password security, etc., as well as fostering an internal culture of security and cyber awareness. New employees receive initial cybersecurity training within 10 days of onboarding, and recurring training on at least an annual basis', 
	 	NULL, 
	 	NULL), 
	(20, "In addition to basic cybersecurity training, personnel who maintain or secure OT as part of their regular duties receive OT-specific cybersecurity training on at least an annual basis.", 
	 	NULL, 
	 	NULL), 
	 (21, "Organizations sponsor at least one ‘pizza party’ or equivalent social gathering per year that is focused on strengthening working relationships between IT and OT security personnel, and is not a working event (such as providing meals during an incident response).", 
	  	NULL,
	  	NULL),
/*VULNERABILITY MANAGEMENT (5.0)*/	 
	 (22, "All known exploited vulnerabilities (listed in CISA’s KEV catalog - https://www.cisa.gov/known-exploited-vulnerabilities-catalog) in internet-facing systems are patched or otherwise mitigated within a riskinformed span of time, prioritizing more critical assets first.", 
	  	NULL, 
	  	"For assets where patching is either not possible or may substantially compromise availability or safety, compensating controls are applied (e.g. segmentation, monitoring) and recorded. Sufficient controls either make the asset inaccessible from the public internet, or reduce the ability of adversaries to exploit the vulnerabilities in these assets."), 
	 (23, "Consistent with NIST SP 800-53 Revision 5, organizations maintain a public, easily-discoverable method for security researchers to notify (e.g. via email address or web form) organizations’ security teams of vulnerable, mis-configured, or otherwise exploitable assets. Valid submissions are acknowledged and responded to in a timely manner, taking into account the completeness and complexity of the vulnerability. Validated and exploitable weaknesses are mitigated consistent with their severity. Security researchers sharing vulnerabilities discovered in good faith are protected under Safe Harbor rules. In instances where vulnerabilities are validated and disclosed, public acknowledgement is given to the researcher who originally submitted the notification.", 
	  	NULL, 
	  	NULL), 
	 (24, "All public-facing web domains have a security.txt file that conforms to the recommendations in RFC 9116.", 
	  	NULL, 
	  	NULL), 
	 (25, "Assets on the public internet expose no exploitable services, such as RDP. Where these services must be exposed, appropriate compensating controls are implemented to prevent common forms of abuse and exploitation. All unnecessary OS applications and network protocols are disabled on internet-facing assets.", 
	  	NULL, 
	  	NULL), 
	 (26, "No OT assets are on the public internet, unless explicitly required for operation. Exceptions must be justified and documented, and excepted assets must have additional protections in place to prevent and detect exploitation attempts (such as logging, MFA, mandatory access via proxy or other intermediary, etc.).", 
	  	NULL, 
	  	NULL), 
	 (27, "Third-parties with demonstrated expertise in (IT and/or OT) cybersecurity regularly validate the effectiveness and coverage of an organization’s cybersecurity defenses. These exercises, which may include penetration tests, bug bounties, incident simulations, or table-top exercises, should include both unannounced and announced tests. Exercises consider both the ability and impact of a potential adversary to infiltrate the network from the outside, as well as the ability of an adversary within the network (e.g., “assume breach”) to pivot laterally to demonstrate potential impact on critical (including OT/ICS) systems. High-impact findings from previous tests are mitigated in a timely manner and are not re-observed in future tests.", 
		NULL, 
	  	NULL), 
/*SUPPLY CHAIN / THIRD PARTY (6.0)*/	 
	 (28, "Organizations’ procurement documents include cybersecurity requirements and questions, which are evaluated in vendor selection such that, given two offerings of roughly similar cost and function, the more secure offering and/or supplier is preferred. ", 
	  	NULL, 
	  	NULL), 
	 (29, "Procurement documents and contracts, such as Service Level Agreements (SLAs), stipulate that vendors and/or service providers notify the procuring customer of security incidents within a riskinformed timeframe as determined by the organization.", 
	  	NULL, 
	  	NULL), 
	 (30, "Procurement documents and contracts, such as Service Level Agreements (SLAs), stipulate that vendors and/or service providers notify the procuring customer of confirmed security vulnerabilities in their assets within a risk-informed timeframe as determined by the organization.", 
	  	NULL, 
	  	NULL), 
/* Response and Recovery */
	 (31, "Organizations maintain codified policy and procedures on to whom and how to report all confirmed cybersecurity incidents to appropriate external entities (e.g. state/federal regulators or SRMA’s as required, ISAC/ISAO, as well as CISA). Known incidents are reported to CISA as well as other necessary parties within timeframes directed by applicable regulatory guidance or in the absence of guidance, as soon as safely capable. This goal will be revisited following full implementation of the Cyber Incident Reporting for Critical Infrastructure Act of 2022 (CIRCIA). ", 
	  	NULL, 
	  	NULL), 
	 (32, "Organizations have, maintain, update, and regularly drill IT and OT cybersecurity incident response plans for both common and organizationally-specific (e.g. by sector, locality, etc.) threat scenarios and TTPs. When conducted, tests or drills are as realistic in nature as feasible. IR plans are drilled at least annually, and are updated within a risk-informed time frame following the lessons learned portion of any exercise or drill.", 
	  	NULL,
	 	NULL), 
	 (33, "All systems that are necessary for operations are regularly backed up on a regular cadence, no less than once per year. Backups are stored separately from the source systems and tested on a recurring basis, no less than once per year. Stored information for OT assets includes at a minimum: configurations, roles, PLC logic, engineering drawings and tools.", 
	  	NULL, 
	  	NULL), 
	(34, "Organizations maintain accurate documentation describing updated network topology and relevant information across all IT and OT networks. Periodic reviews and updates should be performed and tracked on a recurring basis.", 
	 	NULL, 
	 	NULL), 
/*Other (8.0)*/
	 (35, "All connections to the OT network are denied by default unless explicitly allowed (e.g. by IP address and port) for specific system functionality. Necessary communications paths between the IT and OT networks must pass through an intermediary, such as a properly configured firewall, bastion host, “jump box,” or a demilitarized zone (DMZ), which is closely monitored, captures network logs, and only allows connections from approved assets", 
	  	NULL, 
	  	NULL), 
	 (36, "Organizations have documented a list of threats and adversary TTPs relevant to their organization (for example, based on industry, sectors, etc.), and have the ability (such as via rules, alerting, or commercial prevention and detection systems) to detect instances of those key threats.", 
	  	NULL, 
	  	NULL), 
	 (37, "On all corporate email infrastructure (1) STARTTLS is enabled, (2) SPF and DKIM are enabled, and (3) DMARC is enabled and set to “reject.” For further examples and information, see CISA’s past guidance for Federal Agencies at https://www.cisa.gov/binding-operational-directive-18-01.", 
	  	NULL, 
	  	NULL);

/* References Table*/
/*create table References (referencesID int(11), ref_Title varchar(255), ref_purpose varchar(255), ref_link varchar(255));*/
CREATE TABLE `ref` (
  `referencesID` int(11) NOT NULL AUTO_INCREMENT,
  `ref_Title` varchar(255) DEFAULT NULL,
  `ref_link` varchar(255) DEFAULT NULL, 
  PRIMARY KEY (referencesID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

insert into ref (ref_Title, ref_link) values
	("CISA Bad Practices", "https://www.cisa.gov/news-events/news/bad-practices-0"), 
	("XKCD 936", NULL), 
	("Cyber Hygiene Services" , "https://www.cisa.gov/topics/cyber-threats-and-advisories/cyber-hygiene-services"), 
	("email vulnerability@cisa.DHS.gov", "vulnerability@cisa.DHS.gov"), 
	("'Stuff Off Search' Guide", "https://www.cisa.gov/resources-tools/resources/stuff-search"), 
	("Validated Architecture Design Review (VADR); email central@cisa.gov", "central@cisa.gov"), 
	("CISA Cyber Training", "https://www.cisa.gov/resources-tools/training"), 
	("CISA ICS Training", "https://www.cisa.gov/ics-training-available-through-cisa"), 
	 ("Known Exploited Vulnerabilities (KEV) Catalog", "https://www.cisa.gov/known-exploited-vulnerabilities-catalog"), 
	 ("Vulnerability Disclosure Policy Template", "https://www.cisa.gov/vulnerability-disclosure-policy-template"), 
	 ("Disclose.io Policy Maker", "https://policymaker.disclose.io/policymaker/introduction/"), 
	 ("Vulnerability Reporting; email vulnerability@cisa.dhs.gov", "vulnerability@cisa.dhs.gov"), 
	 ("Coordinated Vulnerability Disclosure Process", "https://www.cisa.gov/coordinated-vulnerability-disclosure-process"), 
	 ("https://securitytxt.org", "https://securitytxt.org/"), 
	 ("Remote Penetrating Testing (RPT)", "https://www.cisa.gov/resources-tools/services/penetration-testing"), 
	 ("Risk and Vulnerability Assessment (RVA)", "https://www.cisa.gov/sites/default/files/publications/VM_Assessments_Fact_Sheet_RVA_508C.pdf"), 
	 ("Table Top Exercise Packages", "https://www.cisa.gov/resources-tools/services/cisa-tabletop-exercise-packages"), 
	 ("Critical Infrastructure Exercises", "https://www.cisa.gov/resources-tools/services/stakeholder-exercises"), 
	 ("Incident Reporting", "https://www.cisa.gov/forms/report"), 
	 ("contact report@cisa.gov or (888) 282-0870", "report@cisa.gov"), 
	 ("CISA Binding Operational Directive", "https://www.cisa.gov/news-events/directives/binding-operational-directive-18-01");
	 
/*Reference Instances*/	 
create table ReferenceInstances (refInstancesID int(11), goalID int(11), referencesID int(11));
insert into ReferenceInstances (goalID, referencesID) values 
/*ACCOUNT SECURITY (1.0)*/
	 (2, 1), 
	 (3, 1),
	 (4, 1),
	 (4, 2),
/*DEVICE SECURITY (2.0) [7-11]*/
	 (10, 3),
	 (10, 4), 
	 (10, 5), 
	 (10, 6), 
/*DATA SECURITY (3.0) [12-5]*/
	 (13, 6), 
	 (14, 6), 
	 (15, 6), 
/*GOVERNANCE AND TRAINING (4.0) [16-20]*/
	 (19, 7), 
	 (20, 8), 
/*VULNERABILITY MANAGEMENT (5.0) [21-26]*/
	 (22, 9), 
	 (22, 3), 
	 (22 ,4), 
	 (23, 10),
	 (23, 11), 
	 (23, 12), 
	 (23, 13), 
	 (24, 14), 
	 (25, 3), 
	 (25, 4),
	 (25, 5), 
	 (25, 15), 
	 (25, 16),
	 (26, 3), 
	 (26, 4), 
	 (26, 5), 
	 (26, 15),
	 (27, 15),
	 (27, 16), 
	 (27, 17), 
	 (27, 18), 
/* Response and Recovery (7.0) [30-33]*/
	 (31, 19), 
	 (31, 20), 
	 (32, 17), 
	 (32, 18), 
	 (34, 6), 
/*Other (8.0) [34-36]*/
	 (35, 6), 
	 (37, 21);

/* Files Table*/
/*create table UpdateFiles (fileID int(11), fileLocation varchar(255), goalID int(11));*/
CREATE TABLE `files` (
  `fileID` int(11) NOT NULL AUTO_INCREMENT,
  `fileLocation` varchar(255) DEFAULT NULL,
  `goalID` int(11) DEFAULT NULL, 
  PRIMARY KEY (fileID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


/* Notes Table */
/*create table UpdateNotes (noteID int(11), note_desc varchar(255), goalID int(11));*/
CREATE TABLE `notes` (
  `noteID` int(11) NOT NULL AUTO_INCREMENT,
  `note_desc` varchar(255) DEFAULT NULL,
  `goalID` int(11) DEFAULT NULL, 
  PRIMARY KEY (noteID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
