<?php
/**
 * Presence repository.
 */
namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use AppBundle\Entity\Presence;

/**
 * Class PresenceRepository.
 *
 * @package AppBundle\Repository
 */
class PresenceRepository extends EntityRepository
{
    /**
     * Save entity.
     *
     * @param Presence $presence Presence entity
     */
    public function save(Presence $presence)
    {
        $this->_em->persist($presence);
        $this->_em->flush();
    }

    /**
     * Delete entity.
     *
     * @param Presence $presence Presence entity
     */
    public function delete(Presence $presence)
    {
        $this->_em->remove($presence);
        $this->_em->flush();
    }

    /**
     * Active presence
     *
     * @param Presence $presence Presence
     *
     * @return boolean Result
     */
    public function active(Presence $presence)
    {
        $presence->getGroup() ? $presence->setActive(true) : $presence->setActive(false);

        return $this->save($presence);
    }
}
