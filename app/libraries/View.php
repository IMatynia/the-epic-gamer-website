<?php

class View
{
    public function getHTML(): ?string
    {
        return null;
    }

    public function render(): void
    {
        echo $this->getHTML();
    }
}