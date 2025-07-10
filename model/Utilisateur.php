<?php
class Utilisateur
{
    private int $id;
    private string $nom;
    private string $prenom;
    private string $email;
    private $password;
    private $isAdmin;
    // Constructeur pour initialiser les propriétés
    public function __construct(int $id, string $nom, string $prenom, string $email, string $password, int $isAdmin)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->password = $password;
        $this->isAdmin = $isAdmin;
    }
    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
    /**
     * Get the value of nom
     */
    public function getNom()
    {
        return $this->nom;
    }
    /**
     * Set the value of nom
     *
     * @return  self
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }
    /**
     * Get the value of prenom
     */
    public function getPrenom()
    {
        return $this->prenom;
    }
    /**
     * Set the value of prenom
     *
     * @return  self
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
        return $this;
    }
    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }
    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }
    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }
    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }
    /**
     * Get the value of isAdmin
     */
    public function getIsAdmin()
    {
        return $this->isAdmin;
    }
    /**
     * Set the value of isAdmin
     *
     * @return  self
     */
    public function setIsAdmin($isAdmin)
    {
        $this->isAdmin = $isAdmin;
        return $this;
    }
}