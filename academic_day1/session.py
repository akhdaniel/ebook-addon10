from odoo import api, fields, models, _

class session(models.Model):
    _name = 'academic.session'

    name = fields.Char("Name", required=True)


    course_id = fields.Many2one(comodel_name="academic.course", string="Course", required=False, )
    instructor_id  = fields.Many2one(comodel_name="res.partner", string="Instructor", required=False, )
    start_date  = fields.Date(string="Start Date", required=False, )
    duration = fields.Integer(string="Duration", required=False, )
    seats = fields.Integer(string="Seats", required=False, )
    active  = fields.Boolean(string="Active", )
    
    attendee_ids = fields.One2many(comodel_name="academic.attendee",
                                   inverse_name="session_id",
                                   string="Attendees",
                                   required=False, )

