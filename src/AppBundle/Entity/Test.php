<?php
/**
 * Test entity.
 */
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Test.
 *
 * @package AppBundle\Entity
 *
 * @ORM\Table(
 *     name="tests"
 * )
 * @ORM\Entity(
 *     repositoryClass="AppBundle\Repository\TestRepository"
 * )
 */
class Test
{
    /**
     * Use constants to define configuration options that rarely change instead
     * of specifying them in app/config/config.yml.
     * See http://symfony.com/doc/current/best_practices/configuration.html#constants-vs-configuration-options
     */
    const NUM_ITEMS = 10;

    /**
     * Primary key.
     *
     * @var integer $id
     *
     * @ORM\Id
     * @ORM\Column(
     *     name="id",
     *     type="integer",
     *     nullable=false,
     *     options={"unsigned"=true},
     * )
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Name.
     *
     * @var string $name
     *
     * @ORM\Column(
     *     name="name",
     *     type="string",
     *     nullable=false,
     * )
     * @Assert\NotBlank(
     *     groups={"test-default"}
     * )
     */
    protected $name;

    /**
     * Content.
     *
     * @var string $content
     *
     * @ORM\Column(
     *     name="content",
     *     type="text",
     *     nullable=false,
     * )
     * @Assert\NotBlank(
     *     groups={"test-default"}
     * )
     */
    protected $content;

    /**
     * End time.
     *
     * @var string $end
     *
     * @ORM\Column(
     *     name="end_time",
     *     type="datetime",
     *     nullable=true,
     * )
     */
    protected $end;

    /**
     * Time in minutes
     *
     * @var integer $time
     *
     * @ORM\Column(
     *     name="max_time",
     *     type="integer",
     *     nullable=false,
     * )
     * @Assert\NotBlank(
     *     groups={"test-default"}
     * )
     * @Assert\Range(
     *     groups={"test-default"},
     *     min = 1,
     * )
     */
    protected $time;

    /**
     * Max points.
     *
     * @var integer $max
     *
     * @ORM\Column(
     *     name="max_points",
     *     type="integer",
     *     nullable=false,
     * )
     */
    protected $max;

    /**
     * Allowed ip.
     *
     * @var string $ip
     *
     * @ORM\Column(
     *     name="ip",
     *     type="text",
     *     nullable=true,
     * )
     */
    protected $ip;

    /**
     * Test group
     *
     * @var Presence $group
     *
     * @ORM\ManyToOne(targetEntity="Group")
     * @ORM\JoinColumn(
     *     name="group_id",
     *     referencedColumnName="id",
     *     nullable=false,
     *     onDelete="CASCADE"
     * )
     */
    protected $group;

    /**
     * Test's Questions
     *
     * @var ArrayCollection $questions
     *
     * @ORM\ManyToMany(targetEntity="Question")
     * @ORM\JoinTable(
     *     name="tests_questions",
     *     joinColumns={
     *         @ORM\JoinColumn(
     *             name="test_id",
     *             referencedColumnName="id",
     *             onDelete="CASCADE",
     *         )
     *     },
     *     inverseJoinColumns={
     *         @ORM\JoinColumn(
     *             name="question_id",
     *             referencedColumnName="id",
     *             onDelete="CASCADE",
     *         )
     *     }
     * )
     * @Assert\NotBlank(
     *     groups={"test-default"}
     * )
     */
    protected $questions;

    /**
     * Test results
     *
     * @var ArrayCollection $results
     *
     * @ORM\OneToMany(
     *     targetEntity="Result",
     *     mappedBy="test"
     * )
     */
    protected $results;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->questions = new ArrayCollection();
        $this->results = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Test
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Test
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set end
     *
     * @param \DateTime $end
     * @return Test
     */
    public function setEnd($end)
    {
        $this->end = $end;

        return $this;
    }

    /**
     * Get end
     *
     * @return \DateTime
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * Add questions
     *
     * @param \AppBundle\Entity\Question $questions
     * @return Test
     */
    public function addQuestion(\AppBundle\Entity\Question $questions)
    {
        $this->questions[] = $questions;

        return $this;
    }

    /**
     * Remove questions
     *
     * @param \AppBundle\Entity\Question $questions
     */
    public function removeQuestion(\AppBundle\Entity\Question $questions)
    {
        $this->questions->removeElement($questions);
    }

    /**
     * Get questions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getQuestions()
    {
        return $this->questions;
    }

    /**
     * Set max
     *
     * @param integer $max
     * @return Test
     */
    public function setMax($max)
    {
        $this->max = $max;

        return $this;
    }

    /**
     * Get max
     *
     * @return integer
     */
    public function getMax()
    {
        return $this->max;
    }

    /**
     * Set group
     *
     * @param \AppBundle\Entity\Group $group
     * @return Test
     */
    public function setGroup(\AppBundle\Entity\Group $group)
    {
        $this->group = $group;

        return $this;
    }

    /**
     * Get group
     *
     * @return \AppBundle\Entity\Group
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * Set time
     *
     * @param integer $time
     * @return Test
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get time
     *
     * @return integer
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set ip
     *
     * @param string $ip
     * @return Test
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get ip
     *
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Add results
     *
     * @param \AppBundle\Entity\Result $results
     * @return Test
     */
    public function addResult(\AppBundle\Entity\Result $results)
    {
        $this->results[] = $results;

        return $this;
    }

    /**
     * Remove results
     *
     * @param \AppBundle\Entity\Result $results
     */
    public function removeResult(\AppBundle\Entity\Result $results)
    {
        $this->results->removeElement($results);
    }

    /**
     * Get results
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getResults()
    {
        return $this->results;
    }
}
