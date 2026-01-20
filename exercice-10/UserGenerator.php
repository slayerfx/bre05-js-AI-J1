<?php

/**
 * Classe pour générer des utilisateurs aléatoires
 */
class UserGenerator
{
    private array $firstNames = [
        'Jean', 'Marie', 'Pierre', 'Sophie', 'Lucas', 'Emma', 'Thomas', 'Léa',
        'Nicolas', 'Camille', 'Alexandre', 'Julie', 'Maxime', 'Chloé', 'Antoine',
        'Sarah', 'Julien', 'Laura', 'Romain', 'Manon', 'Kevin', 'Pauline'
    ];

    private array $lastNames = [
        'Martin', 'Bernard', 'Dubois', 'Thomas', 'Robert', 'Richard', 'Petit',
        'Durand', 'Leroy', 'Moreau', 'Simon', 'Laurent', 'Lefebvre', 'Michel',
        'Garcia', 'David', 'Bertrand', 'Roux', 'Vincent', 'Fournier'
    ];

    private array $domains = [
        'gmail.com', 'yahoo.fr', 'hotmail.com', 'outlook.fr', 'orange.fr', 'free.fr'
    ];

    private array $cities = [
        'Paris', 'Lyon', 'Marseille', 'Toulouse', 'Nice', 'Nantes', 'Strasbourg',
        'Montpellier', 'Bordeaux', 'Lille', 'Rennes', 'Reims', 'Tours', 'Grenoble'
    ];

    /**
     * Génère un utilisateur aléatoire
     */
    public function generateUser(): array
    {
        $firstName = $this->getRandomElement($this->firstNames);
        $lastName = $this->getRandomElement($this->lastNames);

        return [
            'id' => $this->generateId(),
            'firstName' => $firstName,
            'lastName' => $lastName,
            'email' => $this->generateEmail($firstName, $lastName),
            'age' => random_int(18, 80),
            'city' => $this->getRandomElement($this->cities),
            'phone' => $this->generatePhone(),
            'createdAt' => $this->generateDate(),
            'isActive' => (bool) random_int(0, 1)
        ];
    }

    /**
     * Génère plusieurs utilisateurs
     */
    public function generateUsers(int $count): array
    {
        $users = [];
        for ($i = 0; $i < $count; $i++) {
            $users[] = $this->generateUser();
        }
        return $users;
    }

    private function getRandomElement(array $array): string
    {
        return $array[array_rand($array)];
    }

    private function generateId(): string
    {
        return uniqid('user_', true);
    }

    private function generateEmail(string $firstName, string $lastName): string
    {
        $firstName = $this->removeAccents(strtolower($firstName));
        $lastName = $this->removeAccents(strtolower($lastName));
        $separator = random_int(0, 1) ? '.' : '_';
        $number = random_int(0, 1) ? random_int(1, 99) : '';
        $domain = $this->getRandomElement($this->domains);

        return "{$firstName}{$separator}{$lastName}{$number}@{$domain}";
    }

    private function generatePhone(): string
    {
        $prefixes = ['06', '07'];
        $prefix = $prefixes[array_rand($prefixes)];
        $number = '';
        for ($i = 0; $i < 8; $i++) {
            $number .= random_int(0, 9);
        }
        return $prefix . $number;
    }

    private function generateDate(): string
    {
        $start = strtotime('-2 years');
        $end = time();
        $timestamp = random_int($start, $end);
        return date('Y-m-d H:i:s', $timestamp);
    }

    private function removeAccents(string $string): string
    {
        $accents = ['é', 'è', 'ê', 'ë', 'à', 'â', 'ä', 'ù', 'û', 'ü', 'ô', 'ö', 'î', 'ï', 'ç'];
        $replace = ['e', 'e', 'e', 'e', 'a', 'a', 'a', 'u', 'u', 'u', 'o', 'o', 'i', 'i', 'c'];
        return str_replace($accents, $replace, $string);
    }
}
