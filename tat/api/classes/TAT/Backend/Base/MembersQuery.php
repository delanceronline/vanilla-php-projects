<?php

namespace TAT\Backend\Base;

use \Exception;
use \PDO;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;
use TAT\Backend\Members as ChildMembers;
use TAT\Backend\MembersQuery as ChildMembersQuery;
use TAT\Backend\Map\MembersTableMap;

/**
 * Base class that represents a query for the 'members' table.
 *
 *
 *
 * @method     ChildMembersQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildMembersQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ChildMembersQuery orderByPassword($order = Criteria::ASC) Order by the password column
 * @method     ChildMembersQuery orderByCreationdate($order = Criteria::ASC) Order by the creationDate column
 * @method     ChildMembersQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildMembersQuery orderByContact($order = Criteria::ASC) Order by the contact column
 * @method     ChildMembersQuery orderByPicurl($order = Criteria::ASC) Order by the picURL column
 * @method     ChildMembersQuery orderByBirthday($order = Criteria::ASC) Order by the birthday column
 * @method     ChildMembersQuery orderByStatus($order = Criteria::ASC) Order by the status column
 *
 * @method     ChildMembersQuery groupById() Group by the id column
 * @method     ChildMembersQuery groupByEmail() Group by the email column
 * @method     ChildMembersQuery groupByPassword() Group by the password column
 * @method     ChildMembersQuery groupByCreationdate() Group by the creationDate column
 * @method     ChildMembersQuery groupByName() Group by the name column
 * @method     ChildMembersQuery groupByContact() Group by the contact column
 * @method     ChildMembersQuery groupByPicurl() Group by the picURL column
 * @method     ChildMembersQuery groupByBirthday() Group by the birthday column
 * @method     ChildMembersQuery groupByStatus() Group by the status column
 *
 * @method     ChildMembersQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildMembersQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildMembersQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildMembersQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildMembersQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildMembersQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildMembersQuery leftJoinForgetpasstoken($relationAlias = null) Adds a LEFT JOIN clause to the query using the Forgetpasstoken relation
 * @method     ChildMembersQuery rightJoinForgetpasstoken($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Forgetpasstoken relation
 * @method     ChildMembersQuery innerJoinForgetpasstoken($relationAlias = null) Adds a INNER JOIN clause to the query using the Forgetpasstoken relation
 *
 * @method     ChildMembersQuery joinWithForgetpasstoken($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Forgetpasstoken relation
 *
 * @method     ChildMembersQuery leftJoinWithForgetpasstoken() Adds a LEFT JOIN clause and with to the query using the Forgetpasstoken relation
 * @method     ChildMembersQuery rightJoinWithForgetpasstoken() Adds a RIGHT JOIN clause and with to the query using the Forgetpasstoken relation
 * @method     ChildMembersQuery innerJoinWithForgetpasstoken() Adds a INNER JOIN clause and with to the query using the Forgetpasstoken relation
 *
 * @method     \TAT\Backend\ForgetpasstokenQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildMembers findOne(ConnectionInterface $con = null) Return the first ChildMembers matching the query
 * @method     ChildMembers findOneOrCreate(ConnectionInterface $con = null) Return the first ChildMembers matching the query, or a new ChildMembers object populated from the query conditions when no match is found
 *
 * @method     ChildMembers findOneById(int $id) Return the first ChildMembers filtered by the id column
 * @method     ChildMembers findOneByEmail(string $email) Return the first ChildMembers filtered by the email column
 * @method     ChildMembers findOneByPassword(string $password) Return the first ChildMembers filtered by the password column
 * @method     ChildMembers findOneByCreationdate(string $creationDate) Return the first ChildMembers filtered by the creationDate column
 * @method     ChildMembers findOneByName(string $name) Return the first ChildMembers filtered by the name column
 * @method     ChildMembers findOneByContact(string $contact) Return the first ChildMembers filtered by the contact column
 * @method     ChildMembers findOneByPicurl(string $picURL) Return the first ChildMembers filtered by the picURL column
 * @method     ChildMembers findOneByBirthday(string $birthday) Return the first ChildMembers filtered by the birthday column
 * @method     ChildMembers findOneByStatus(int $status) Return the first ChildMembers filtered by the status column *

 * @method     ChildMembers requirePk($key, ConnectionInterface $con = null) Return the ChildMembers by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMembers requireOne(ConnectionInterface $con = null) Return the first ChildMembers matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildMembers requireOneById(int $id) Return the first ChildMembers filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMembers requireOneByEmail(string $email) Return the first ChildMembers filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMembers requireOneByPassword(string $password) Return the first ChildMembers filtered by the password column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMembers requireOneByCreationdate(string $creationDate) Return the first ChildMembers filtered by the creationDate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMembers requireOneByName(string $name) Return the first ChildMembers filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMembers requireOneByContact(string $contact) Return the first ChildMembers filtered by the contact column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMembers requireOneByPicurl(string $picURL) Return the first ChildMembers filtered by the picURL column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMembers requireOneByBirthday(string $birthday) Return the first ChildMembers filtered by the birthday column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMembers requireOneByStatus(int $status) Return the first ChildMembers filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildMembers[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildMembers objects based on current ModelCriteria
 * @method     ChildMembers[]|ObjectCollection findById(int $id) Return ChildMembers objects filtered by the id column
 * @method     ChildMembers[]|ObjectCollection findByEmail(string $email) Return ChildMembers objects filtered by the email column
 * @method     ChildMembers[]|ObjectCollection findByPassword(string $password) Return ChildMembers objects filtered by the password column
 * @method     ChildMembers[]|ObjectCollection findByCreationdate(string $creationDate) Return ChildMembers objects filtered by the creationDate column
 * @method     ChildMembers[]|ObjectCollection findByName(string $name) Return ChildMembers objects filtered by the name column
 * @method     ChildMembers[]|ObjectCollection findByContact(string $contact) Return ChildMembers objects filtered by the contact column
 * @method     ChildMembers[]|ObjectCollection findByPicurl(string $picURL) Return ChildMembers objects filtered by the picURL column
 * @method     ChildMembers[]|ObjectCollection findByBirthday(string $birthday) Return ChildMembers objects filtered by the birthday column
 * @method     ChildMembers[]|ObjectCollection findByStatus(int $status) Return ChildMembers objects filtered by the status column
 * @method     ChildMembers[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class MembersQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \TAT\Backend\Base\MembersQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\TAT\\Backend\\Members', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildMembersQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildMembersQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildMembersQuery) {
            return $criteria;
        }
        $query = new ChildMembersQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildMembers|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(MembersTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = MembersTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildMembers A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, email, password, creationDate, name, contact, picURL, birthday, status FROM members WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildMembers $obj */
            $obj = new ChildMembers();
            $obj->hydrate($row);
            MembersTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildMembers|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildMembersQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(MembersTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildMembersQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(MembersTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMembersQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(MembersTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(MembersTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MembersTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByEmail('%fooValue%'); // WHERE email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMembersQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MembersTableMap::COL_EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the password column
     *
     * Example usage:
     * <code>
     * $query->filterByPassword('fooValue');   // WHERE password = 'fooValue'
     * $query->filterByPassword('%fooValue%'); // WHERE password LIKE '%fooValue%'
     * </code>
     *
     * @param     string $password The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMembersQuery The current query, for fluid interface
     */
    public function filterByPassword($password = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($password)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MembersTableMap::COL_PASSWORD, $password, $comparison);
    }

    /**
     * Filter the query on the creationDate column
     *
     * Example usage:
     * <code>
     * $query->filterByCreationdate('2011-03-14'); // WHERE creationDate = '2011-03-14'
     * $query->filterByCreationdate('now'); // WHERE creationDate = '2011-03-14'
     * $query->filterByCreationdate(array('max' => 'yesterday')); // WHERE creationDate > '2011-03-13'
     * </code>
     *
     * @param     mixed $creationdate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMembersQuery The current query, for fluid interface
     */
    public function filterByCreationdate($creationdate = null, $comparison = null)
    {
        if (is_array($creationdate)) {
            $useMinMax = false;
            if (isset($creationdate['min'])) {
                $this->addUsingAlias(MembersTableMap::COL_CREATIONDATE, $creationdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($creationdate['max'])) {
                $this->addUsingAlias(MembersTableMap::COL_CREATIONDATE, $creationdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MembersTableMap::COL_CREATIONDATE, $creationdate, $comparison);
    }

    /**
     * Filter the query on the name column
     *
     * Example usage:
     * <code>
     * $query->filterByName('fooValue');   // WHERE name = 'fooValue'
     * $query->filterByName('%fooValue%'); // WHERE name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMembersQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MembersTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the contact column
     *
     * Example usage:
     * <code>
     * $query->filterByContact('fooValue');   // WHERE contact = 'fooValue'
     * $query->filterByContact('%fooValue%'); // WHERE contact LIKE '%fooValue%'
     * </code>
     *
     * @param     string $contact The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMembersQuery The current query, for fluid interface
     */
    public function filterByContact($contact = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($contact)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MembersTableMap::COL_CONTACT, $contact, $comparison);
    }

    /**
     * Filter the query on the picURL column
     *
     * Example usage:
     * <code>
     * $query->filterByPicurl('fooValue');   // WHERE picURL = 'fooValue'
     * $query->filterByPicurl('%fooValue%'); // WHERE picURL LIKE '%fooValue%'
     * </code>
     *
     * @param     string $picurl The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMembersQuery The current query, for fluid interface
     */
    public function filterByPicurl($picurl = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($picurl)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MembersTableMap::COL_PICURL, $picurl, $comparison);
    }

    /**
     * Filter the query on the birthday column
     *
     * Example usage:
     * <code>
     * $query->filterByBirthday('2011-03-14'); // WHERE birthday = '2011-03-14'
     * $query->filterByBirthday('now'); // WHERE birthday = '2011-03-14'
     * $query->filterByBirthday(array('max' => 'yesterday')); // WHERE birthday > '2011-03-13'
     * </code>
     *
     * @param     mixed $birthday The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMembersQuery The current query, for fluid interface
     */
    public function filterByBirthday($birthday = null, $comparison = null)
    {
        if (is_array($birthday)) {
            $useMinMax = false;
            if (isset($birthday['min'])) {
                $this->addUsingAlias(MembersTableMap::COL_BIRTHDAY, $birthday['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($birthday['max'])) {
                $this->addUsingAlias(MembersTableMap::COL_BIRTHDAY, $birthday['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MembersTableMap::COL_BIRTHDAY, $birthday, $comparison);
    }

    /**
     * Filter the query on the status column
     *
     * Example usage:
     * <code>
     * $query->filterByStatus(1234); // WHERE status = 1234
     * $query->filterByStatus(array(12, 34)); // WHERE status IN (12, 34)
     * $query->filterByStatus(array('min' => 12)); // WHERE status > 12
     * </code>
     *
     * @param     mixed $status The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMembersQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (is_array($status)) {
            $useMinMax = false;
            if (isset($status['min'])) {
                $this->addUsingAlias(MembersTableMap::COL_STATUS, $status['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($status['max'])) {
                $this->addUsingAlias(MembersTableMap::COL_STATUS, $status['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MembersTableMap::COL_STATUS, $status, $comparison);
    }

    /**
     * Filter the query by a related \TAT\Backend\Forgetpasstoken object
     *
     * @param \TAT\Backend\Forgetpasstoken|ObjectCollection $forgetpasstoken the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildMembersQuery The current query, for fluid interface
     */
    public function filterByForgetpasstoken($forgetpasstoken, $comparison = null)
    {
        if ($forgetpasstoken instanceof \TAT\Backend\Forgetpasstoken) {
            return $this
                ->addUsingAlias(MembersTableMap::COL_ID, $forgetpasstoken->getMemberid(), $comparison);
        } elseif ($forgetpasstoken instanceof ObjectCollection) {
            return $this
                ->useForgetpasstokenQuery()
                ->filterByPrimaryKeys($forgetpasstoken->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByForgetpasstoken() only accepts arguments of type \TAT\Backend\Forgetpasstoken or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Forgetpasstoken relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildMembersQuery The current query, for fluid interface
     */
    public function joinForgetpasstoken($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Forgetpasstoken');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Forgetpasstoken');
        }

        return $this;
    }

    /**
     * Use the Forgetpasstoken relation Forgetpasstoken object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \TAT\Backend\ForgetpasstokenQuery A secondary query class using the current class as primary query
     */
    public function useForgetpasstokenQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinForgetpasstoken($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Forgetpasstoken', '\TAT\Backend\ForgetpasstokenQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildMembers $members Object to remove from the list of results
     *
     * @return $this|ChildMembersQuery The current query, for fluid interface
     */
    public function prune($members = null)
    {
        if ($members) {
            $this->addUsingAlias(MembersTableMap::COL_ID, $members->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the members table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(MembersTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            MembersTableMap::clearInstancePool();
            MembersTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(MembersTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(MembersTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            MembersTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            MembersTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // MembersQuery
