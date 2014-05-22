<?php

class sfGuardUser extends PluginsfGuardUser
{
    /**
     * Returns the string representation of the object.
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->getName();
    }
}
