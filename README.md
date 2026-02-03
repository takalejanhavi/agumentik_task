Real-Time Live Poll Platform
Overview

A web-based polling system where authenticated users can vote in polls with IP-based restrictions.
Poll results update in real time, and admins can release an IP to allow re-voting while preserving vote history.

Tech Stack

Laravel (routing, authentication, views)

Core PHP (voting and IP logic)

MySQL

HTML, CSS, Bootstrap

JavaScript, jQuery

AJAX (no page reloads)

Login Credentials
Email: admin@test.com
Password: password123

Features
Module 1: Authentication & Polls

Login required to access polls

Create polls with multiple options

Active/inactive poll control

Only active polls visible

Poll list and poll view loaded using AJAX

Module 2: IP-Restricted Voting

One vote per poll per IP

Server-side IP validation

Vote data stored with timestamp

Duplicate votes blocked

Voting via AJAX (no reload)

Module 3: Real-Time Results

Live vote counts per option

Results update automatically

Implemented using AJAX polling

Module 4: IP Release & Audit

Admin can view IPs per poll

Admin can release an IP

Released votes removed from results

Same IP can vote again after release

Complete vote history preserved

How to Test

Login using the provided credentials

Create and activate a poll

Vote once from a device

Try voting again from the same IP (blocked)

Observe live result updates

Release IP from admin view

Vote again from the same IP

Notes

No hardcoded poll or vote logic

No frontend-only restrictions

No page reloads for voting, results, or IP release

Votes are never deleted; history is preserved

License

MIT License
