{
	"name": "Academic Information System Day 4",
	"version": "1.0", 
	"depends": [
		"base",
		"account",
		"sale",
	],
	"author": "akhmad.daniel@gmail.com", 
	"category": "Education", 
	'website': 'http://www.vitraining.com',
	"description": """\
Academic Information System Day 4
--------------------------------------------------
* Add security groups
* Add security ir.model.accss.csv
* Add wizard
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
	],
	"installable": True,
	"auto_install": False,
    "application": True,
}
