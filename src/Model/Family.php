<?php

require_once 'Model.php';

class Family extends Model
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
                Families.id,
                Families.name,
                Families.quantity_members
            FROM families as Families
            ORDER BY Families.id
        ";
        $results = $this->execute($sql);

        foreach ($results as $key => $family) {
        	$totals = $this->totals($family['id']);
        	$results[$key] = array_merge($family, $totals);
        }

        return $results;
    }

    /**
     * totals method It will get the totals for Families.
     * @param int $id Family Id
     * @return array
     */
    public function totals($id)
    {
        $sql = "
            SELECT
                (SELECT COUNT(*) FROM wars as Wars WHERE (family_id_challenging = :id OR family_id_challenged = :id)) AS Wars,
                (SELECT COUNT(*) FROM wars as Wars WHERE family_id_winner = :id) AS Victories
        ";
        $statement = $this->getConnection()->prepare($sql);

        $statement->execute(['id' => $id]);

        return $statement->fetch(PDO::FETCH_ASSOC);
    }
}