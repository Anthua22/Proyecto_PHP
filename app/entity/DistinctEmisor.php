<?php


namespace FUTAPP\app\entity;


class DistinctEmisor
{
    private int $emisor;
    private int $receptor;

    /**
     * @return int
     */
    public function getEmisor(): int
    {
        return $this->emisor;
    }

    /**
     * @return int
     */
    public function getReceptor(): int
    {
        return $this->receptor;
    }

    /**
     * @param int $receptor
     */
    public function setReceptor(int $receptor): void
    {
        $this->receptor = $receptor;
    }

    /**
     * @param int $emisorr
     */
    public function setEmisorr(int $emisor): void
    {
        $this->emisor = $emisor;
    }


}