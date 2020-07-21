{
	"name": "Academic Information System Day 5",
	"version": "1.0", 
	"depends": [
		"base",
		"account",
		"sale",
		"board",
	],
	"author": "akhmad.daniel@gmail.com", 
	"category": "Education", 
	'website': 'http://www.vitraining.com',
	"description": """\
Academic Information System Day 5
--------------------------------------------------
* Add report QWEB
* Add dashboard


""",
	"data": [
		"menu.xml",
		"course.xml",
		"session.xml",
		"attendee.xml",
		"partner.xml",
		"workflow.xml",
		"security/group.xml",
		"security/ir.model.access.csv",
		"wizard/create_attendee.xml",
		"report/session.xml",
		"dashboard.xml",
	],
	"installable": True,
	"auto_install": False,
    "application": True,
}
