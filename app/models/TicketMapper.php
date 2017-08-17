<?php
class TicketMapper
{
    public $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getTicketsById($id)
    {
        return new Ticket($id);
    }

    public function getTickets()
    {
        return new Ticket(1, 'titulo', 'componente', 'decricao');
    }
}
