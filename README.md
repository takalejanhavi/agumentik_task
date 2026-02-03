🗳️ Real-Time Live Poll Platform

with IP Restriction & Admin Moderation

📌 Project Overview

This project is a real-time web-based polling platform built as per the given problem statement.
It allows authenticated users to participate in polls with strict IP-based voting restrictions, live result updates, and admin-controlled IP release with full audit history.

The system is implemented using Laravel for structure & authentication and Core PHP for voting logic, strictly following the required tech stack and constraints.

⚙️ Tech Stack

Backend: Laravel (Routing, Auth, Views) + Core PHP (Voting Logic)

Frontend: HTML, CSS, Bootstrap, JavaScript, jQuery

AJAX: Used for all interactions (no page reloads)

Database: MySQL

🔐 Authentication

Only authenticated users can access polls and vote.

Login is mandatory before accessing any poll functionality.

Default Login Credentials
Email: admin@test.com
Password: password123


These credentials are created using a database seeder for easy evaluation.

🧩 Modules Implemented
✅ Module 1: Authentication & Poll Display

Login-based access control

Admin can create polls with:

Question

Multiple options

Active / Inactive status

Only active polls are visible to users

Poll list and poll view are loaded via AJAX

No hardcoded poll data

No page reload during navigation

✅ Module 2: IP-Restricted Voting (Core Logic)

One vote per poll per IP address

Restriction enforced server-side using:

Poll ID

IP Address

Vote data stored:

Poll ID

Selected option

IP address

Vote timestamp

Voting handled via AJAX

Duplicate voting from same IP is blocked with a clear message

No page reload during voting

✅ Module 3: Real-Time Poll Results

Live vote counts displayed per option

Results update automatically every ~1 second

Implemented using AJAX polling

No page refresh required

Works across multiple tabs/devices

✅ Module 4: IP Release, Vote Rollback & Audit History

Admin can:

View all IPs that voted on a poll

Release an IP for a specific poll

When IP is released:

The vote is soft-removed from results

Live results update immediately

Same IP can vote again after release

Full audit history preserved:

Original vote

Release timestamp

New vote details

Votes are never deleted, ensuring traceability

🧪 How to Test (Evaluator Guide)

Login using provided credentials

Create a poll and mark it active

Vote once → success

Try voting again from same IP → blocked

Observe live results updating automatically

Open admin vote view

Release IP

Vote again from same IP → allowed

Verify old vote is marked as released and history is preserved

🚫 Constraints Followed

❌ No frontend-only vote restriction

❌ No hardcoded poll or vote logic

❌ No page reload for voting, results, or IP release

❌ No deletion of vote data without history

🎯 Key Highlights

Strict backend-enforced IP restriction

Real-time updates without WebSockets

Clean, simple, responsive UI

Audit-safe vote rollback mechanism

Fully compliant with the given problem statement

📄 License

This project is developed for evaluation purposes and follows the MIT License.

✅ Final Note

This implementation strictly follows the provided requirements, uses the mandated technologies, and handles all edge cases including IP release and audit history.

Ready for evaluation and live demonstration.