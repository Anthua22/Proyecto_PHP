<?php


namespace FUTAPP\app\entity;


class DistinctReceptor
{
    private int $receptor;

    /**
     * @return int
     */
    public function getReceptor(): int
    {
        return $this->receptor;
    }

    /**
     * @param int $emisorr
     */
    public function setReceptor(int $emisor): void
    {
        $this->receptor = $emisor;
    }


}