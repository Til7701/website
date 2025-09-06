<?php

namespace dao;

class PostDAOFactory
{

    public static function create(): PostDAO
    {
        return new HardcodedPostDAO();
    }

}
