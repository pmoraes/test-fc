<?php

require_once 'Model.php';

class War extends Model
{

    /**
     * index method Get all records to show in the index page
     *
     * @return array
     */
    public function index()
    {
        $sql = "
            SELECT
                Wars.id,
                Wars.date_start,
                Wars.date_end,
                Challenging.name as ChallengingName,
                Challenged.name as ChallengedName,
                Winner.name as WinnerName
            FROM wars as Wars
            INNER JOIN families as Challenging ON Wars.family_id_challenging = Challenging.id
            INNER JOIN families as Challenged ON Wars.family_id_challenged = Challenged.id
            INNER JOIN families as Winner ON Wars.family_id_winner = Winner.id
            ORDER BY Wars.id
        ";
        return $this->execute($sql);
    }

    /**
     * view method Get a specific record.
     *
     * @return array
     */
    public function view($id)
    {
        $sql = "
            SELECT
                Wars.id,
                Wars.date_start,
                Wars.date_end,
                Challenging.name as ChallengingName,
                Challenged.name as ChallengedName,
                Winner.name as WinnerName
            FROM wars as Wars
            INNER JOIN families as Challenging ON Wars.family_id_challenging = Challenging.id
            INNER JOIN families as Challenged ON Wars.family_id_challenged = Challenged.id
            INNER JOIN families as Winner ON Wars.family_id_winner = Winner.id
            WHERE Wars.id = :id
        ";
        $statement = $this->getConnection()->prepare($sql);

        $statement->execute(['id' => $id]);

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * getFamiliesList method Get all families
     *
     * @return array
     */
    public function getFamiliesList()
    {
        $sql = "SELECT id, name FROM families";
        return $this->execute($sql);
    }

    /**
     * search method It will search the wars based in the dates.
     *
     * @param array $data Data from request.
     * @return array
     */
    public function search($data)
    {
        $data['date_start'] = date('Y-m-d H:s:i', strtotime($data['date_start']));
        $data['date_end'] = date('Y-m-d H:s:i', strtotime($data['date_end']));
        $sql = "
            SELECT
                Wars.id,
                Wars.date_start,
                Wars.date_end,
                Challenging.name as ChallengingName,
                Challenged.name as ChallengedName,
                Winner.name as WinnerName
            FROM wars as Wars
            INNER JOIN families as Challenging ON Wars.family_id_challenging = Challenging.id
            INNER JOIN families as Challenged ON Wars.family_id_challenged = Challenged.id
            INNER JOIN families as Winner ON Wars.family_id_winner = Winner.id
            WHERE 1 = 1
            AND Wars.date_start >= :date_start
            AND Wars.date_end <= :date_end
        ";
        $statement = $this->getConnection()->prepare($sql);

        $statement->execute($data);

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}