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
use TAT\Backend\Forgetpasstoken as ChildForgetpasstoken;
use TAT\Backend\ForgetpasstokenQuery as ChildForgetpasstokenQuery;
use TAT\Backend\Map\ForgetpasstokenTableMap;

/**
 * Base class that represents a query for the 'forgetPassToken' table.
 *
 *
 *
 * @method     ChildForgetpasstokenQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildForgetpasstokenQuery orderByToken($order = Criteria::ASC) Order by the token column
 * @method     ChildForgetpasstokenQuery orderByCreationtime($order = Criteria::ASC) Order by the creationTime column
 * @method     ChildForgetpasstokenQuery orderByMemberid($order = Criteria::ASC) Order by the memberID column
 * @method     ChildForgetpasstokenQuery orderByStatus($order = Criteria::ASC) Order by the status column
 *
 * @method     ChildForgetpasstokenQuery groupById() Group by the id column
 * @method     ChildForgetpasstokenQuery groupByToken() Group by the token column
 * @method     ChildForgetpasstokenQuery groupByCreationtime() Group by the creationTime column
 * @method     ChildForgetpasstokenQuery groupByMemberid() Group by the memberID column
 * @method     ChildForgetpasstokenQuery groupByStatus() Group by the status column
 *
 * @method     ChildForgetpasstokenQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildForgetpasstokenQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildForgetpasstokenQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildForgetpasstokenQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildForgetpasstokenQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildForgetpasstokenQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildForgetpasstokenQuery leftJoinMembers($relationAlias = null) Adds a LEFT JOIN clause to the query using the Members relation
 * @method     ChildForgetpasstokenQuery rightJoinMembers($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Members relation
 * @method     ChildForgetpasstokenQuery innerJoinMembers($relationAlias = null) Adds a INNER JOIN clause to the query using the Members relation
 *
 * @method     ChildForgetpasstokenQuery joinWithMembers($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Members relation
 *
 * @method     ChildForgetpasstokenQuery leftJoinWithMembers() Adds a LEFT JOIN clause and with to the query using the Members relation
 * @method     ChildForgetpasstokenQuery rightJoinWithMembers() Adds a RIGHT JOIN clause and with to the query using the Members relation
 * @method     ChildForgetpasstokenQuery innerJoinWithMembers() Adds a INNER JOIN clause and with to the query using the Members relation
 *
 * @method     \TAT\Backend\MembersQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildForgetpasstoken findOne(ConnectionInterface $con = null) Return the first ChildForgetpasstoken matching the query
 * @method     ChildForgetpasstoken findOneOrCreate(ConnectionInterface $con = null) Return the first ChildForgetpasstoken matching the query, or a new ChildForgetpasstoken object populated from the query conditions when no match is found
 *
 * @method     ChildForgetpasstoken findOneById(int $id) Return the first ChildForgetpasstoken filtered by the id column
 * @method     ChildForgetpasstoken findOneByToken(string $token) Return the first ChildForgetpasstoken filtered by the token column
 * @method     ChildForgetpasstoken findOneByCreationtime(string $creationTime) Return the first ChildForgetpasstoken filtered by the creationTime column
 * @method     ChildForgetpasstoken findOneByMemberid(int $memberID) Return the first ChildForgetpasstoken filtered by the memberID column
 * @method     ChildForgetpasstoken findOneByStatus(int $status) Return the first ChildForgetpasstoken filtered by the status column *

 * @method     ChildForgetpasstoken requirePk($key, ConnectionInterface $con = null) Return the ChildForgetpasstoken by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildForgetpasstoken requireOne(ConnectionInterface $con = null) Return the first ChildForgetpasstoken matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildForgetpasstoken requireOneById(int $id) Return the first ChildForgetpasstoken filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildForgetpasstoken requireOneByToken(string $token) Return the first ChildForgetpasstoken filtered by the token column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildForgetpasstoken requireOneByCreationtime(string $creationTime) Return the first ChildForgetpasstoken filtered by the creationTime column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildForgetpasstoken requireOneByMemberid(int $memberID) Return the first ChildForgetpasstoken filtered by the memberID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildForgetpasstoken requireOneByStatus(int $status) Return the first ChildForgetpasstoken filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildForgetpasstoken[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildForgetpasstoken objects based on current ModelCriteria
 * @method     ChildForgetpasstoken[]|ObjectCollection findById(int $id) Return ChildForgetpasstoken objects filtered by the id column
 * @method     ChildForgetpasstoken[]|ObjectCollection findByToken(string $token) Return ChildForgetpasstoken objects filtered by the token column
 * @method     ChildForgetpasstoken[]|ObjectCollection findByCreationtime(string $creationTime) Return ChildForgetpasstoken objects filtered by the creationTime column
 * @method     ChildForgetpasstoken[]|ObjectCollection findByMemberid(int $memberID) Return ChildForgetpasstoken objects filtered by the memberID column
 * @method     ChildForgetpasstoken[]|ObjectCollection findByStatus(int $status) Return ChildForgetpasstoken objects filtered by the status column
 * @method     ChildForgetpasstoken[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ForgetpasstokenQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \TAT\Backend\Base\ForgetpasstokenQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\TAT\\Backend\\Forgetpasstoken', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildForgetpasstokenQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildForgetpasstokenQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildForgetpasstokenQuery) {
            return $criteria;
        }
        $query = new ChildForgetpasstokenQuery();
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
     * @return ChildForgetpasstoken|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ForgetpasstokenTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ForgetpasstokenTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildForgetpasstoken A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, token, creationTime, memberID, status FROM forgetPassToken WHERE id = :p0';
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
            /** @var ChildForgetpasstoken $obj */
            $obj = new ChildForgetpasstoken();
            $obj->hydrate($row);
            ForgetpasstokenTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildForgetpasstoken|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildForgetpasstokenQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ForgetpasstokenTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildForgetpasstokenQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ForgetpasstokenTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildForgetpasstokenQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ForgetpasstokenTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ForgetpasstokenTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ForgetpasstokenTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the token column
     *
     * Example usage:
     * <code>
     * $query->filterByToken('fooValue');   // WHERE token = 'fooValue'
     * $query->filterByToken('%fooValue%'); // WHERE token LIKE '%fooValue%'
     * </code>
     *
     * @param     string $token The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildForgetpasstokenQuery The current query, for fluid interface
     */
    public function filterByToken($token = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($token)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ForgetpasstokenTableMap::COL_TOKEN, $token, $comparison);
    }

    /**
     * Filter the query on the creationTime column
     *
     * Example usage:
     * <code>
     * $query->filterByCreationtime('2011-03-14'); // WHERE creationTime = '2011-03-14'
     * $query->filterByCreationtime('now'); // WHERE creationTime = '2011-03-14'
     * $query->filterByCreationtime(array('max' => 'yesterday')); // WHERE creationTime > '2011-03-13'
     * </code>
     *
     * @param     mixed $creationtime The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildForgetpasstokenQuery The current query, for fluid interface
     */
    public function filterByCreationtime($creationtime = null, $comparison = null)
    {
        if (is_array($creationtime)) {
            $useMinMax = false;
            if (isset($creationtime['min'])) {
                $this->addUsingAlias(ForgetpasstokenTableMap::COL_CREATIONTIME, $creationtime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($creationtime['max'])) {
                $this->addUsingAlias(ForgetpasstokenTableMap::COL_CREATIONTIME, $creationtime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ForgetpasstokenTableMap::COL_CREATIONTIME, $creationtime, $comparison);
    }

    /**
     * Filter the query on the memberID column
     *
     * Example usage:
     * <code>
     * $query->filterByMemberid(1234); // WHERE memberID = 1234
     * $query->filterByMemberid(array(12, 34)); // WHERE memberID IN (12, 34)
     * $query->filterByMemberid(array('min' => 12)); // WHERE memberID > 12
     * </code>
     *
     * @see       filterByMembers()
     *
     * @param     mixed $memberid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildForgetpasstokenQuery The current query, for fluid interface
     */
    public function filterByMemberid($memberid = null, $comparison = null)
    {
        if (is_array($memberid)) {
            $useMinMax = false;
            if (isset($memberid['min'])) {
                $this->addUsingAlias(ForgetpasstokenTableMap::COL_MEMBERID, $memberid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($memberid['max'])) {
                $this->addUsingAlias(ForgetpasstokenTableMap::COL_MEMBERID, $memberid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ForgetpasstokenTableMap::COL_MEMBERID, $memberid, $comparison);
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
     * @return $this|ChildForgetpasstokenQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (is_array($status)) {
            $useMinMax = false;
            if (isset($status['min'])) {
                $this->addUsingAlias(ForgetpasstokenTableMap::COL_STATUS, $status['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($status['max'])) {
                $this->addUsingAlias(ForgetpasstokenTableMap::COL_STATUS, $status['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ForgetpasstokenTableMap::COL_STATUS, $status, $comparison);
    }

    /**
     * Filter the query by a related \TAT\Backend\Members object
     *
     * @param \TAT\Backend\Members|ObjectCollection $members The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildForgetpasstokenQuery The current query, for fluid interface
     */
    public function filterByMembers($members, $comparison = null)
    {
        if ($members instanceof \TAT\Backend\Members) {
            return $this
                ->addUsingAlias(ForgetpasstokenTableMap::COL_MEMBERID, $members->getId(), $comparison);
        } elseif ($members instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ForgetpasstokenTableMap::COL_MEMBERID, $members->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByMembers() only accepts arguments of type \TAT\Backend\Members or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Members relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildForgetpasstokenQuery The current query, for fluid interface
     */
    public function joinMembers($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Members');

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
            $this->addJoinObject($join, 'Members');
        }

        return $this;
    }

    /**
     * Use the Members relation Members object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \TAT\Backend\MembersQuery A secondary query class using the current class as primary query
     */
    public function useMembersQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinMembers($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Members', '\TAT\Backend\MembersQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildForgetpasstoken $forgetpasstoken Object to remove from the list of results
     *
     * @return $this|ChildForgetpasstokenQuery The current query, for fluid interface
     */
    public function prune($forgetpasstoken = null)
    {
        if ($forgetpasstoken) {
            $this->addUsingAlias(ForgetpasstokenTableMap::COL_ID, $forgetpasstoken->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the forgetPassToken table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ForgetpasstokenTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ForgetpasstokenTableMap::clearInstancePool();
            ForgetpasstokenTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ForgetpasstokenTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ForgetpasstokenTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ForgetpasstokenTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ForgetpasstokenTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ForgetpasstokenQuery
