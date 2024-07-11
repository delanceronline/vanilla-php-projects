<?php

namespace TAT\Backend\Base;

use \Exception;
use \PDO;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;
use TAT\Backend\Coupons as ChildCoupons;
use TAT\Backend\CouponsQuery as ChildCouponsQuery;
use TAT\Backend\Map\CouponsTableMap;

/**
 * Base class that represents a query for the 'coupons' table.
 *
 *
 *
 * @method     ChildCouponsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildCouponsQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     ChildCouponsQuery orderByDetail($order = Criteria::ASC) Order by the detail column
 * @method     ChildCouponsQuery orderByPicurl($order = Criteria::ASC) Order by the picURL column
 * @method     ChildCouponsQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildCouponsQuery orderByCreationdate($order = Criteria::ASC) Order by the creationDate column
 * @method     ChildCouponsQuery orderByEditiondate($order = Criteria::ASC) Order by the editionDate column
 *
 * @method     ChildCouponsQuery groupById() Group by the id column
 * @method     ChildCouponsQuery groupByTitle() Group by the title column
 * @method     ChildCouponsQuery groupByDetail() Group by the detail column
 * @method     ChildCouponsQuery groupByPicurl() Group by the picURL column
 * @method     ChildCouponsQuery groupByStatus() Group by the status column
 * @method     ChildCouponsQuery groupByCreationdate() Group by the creationDate column
 * @method     ChildCouponsQuery groupByEditiondate() Group by the editionDate column
 *
 * @method     ChildCouponsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCouponsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCouponsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCouponsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildCouponsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildCouponsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildCoupons findOne(ConnectionInterface $con = null) Return the first ChildCoupons matching the query
 * @method     ChildCoupons findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCoupons matching the query, or a new ChildCoupons object populated from the query conditions when no match is found
 *
 * @method     ChildCoupons findOneById(int $id) Return the first ChildCoupons filtered by the id column
 * @method     ChildCoupons findOneByTitle(string $title) Return the first ChildCoupons filtered by the title column
 * @method     ChildCoupons findOneByDetail(string $detail) Return the first ChildCoupons filtered by the detail column
 * @method     ChildCoupons findOneByPicurl(string $picURL) Return the first ChildCoupons filtered by the picURL column
 * @method     ChildCoupons findOneByStatus(int $status) Return the first ChildCoupons filtered by the status column
 * @method     ChildCoupons findOneByCreationdate(string $creationDate) Return the first ChildCoupons filtered by the creationDate column
 * @method     ChildCoupons findOneByEditiondate(string $editionDate) Return the first ChildCoupons filtered by the editionDate column *

 * @method     ChildCoupons requirePk($key, ConnectionInterface $con = null) Return the ChildCoupons by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCoupons requireOne(ConnectionInterface $con = null) Return the first ChildCoupons matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCoupons requireOneById(int $id) Return the first ChildCoupons filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCoupons requireOneByTitle(string $title) Return the first ChildCoupons filtered by the title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCoupons requireOneByDetail(string $detail) Return the first ChildCoupons filtered by the detail column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCoupons requireOneByPicurl(string $picURL) Return the first ChildCoupons filtered by the picURL column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCoupons requireOneByStatus(int $status) Return the first ChildCoupons filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCoupons requireOneByCreationdate(string $creationDate) Return the first ChildCoupons filtered by the creationDate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCoupons requireOneByEditiondate(string $editionDate) Return the first ChildCoupons filtered by the editionDate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCoupons[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildCoupons objects based on current ModelCriteria
 * @method     ChildCoupons[]|ObjectCollection findById(int $id) Return ChildCoupons objects filtered by the id column
 * @method     ChildCoupons[]|ObjectCollection findByTitle(string $title) Return ChildCoupons objects filtered by the title column
 * @method     ChildCoupons[]|ObjectCollection findByDetail(string $detail) Return ChildCoupons objects filtered by the detail column
 * @method     ChildCoupons[]|ObjectCollection findByPicurl(string $picURL) Return ChildCoupons objects filtered by the picURL column
 * @method     ChildCoupons[]|ObjectCollection findByStatus(int $status) Return ChildCoupons objects filtered by the status column
 * @method     ChildCoupons[]|ObjectCollection findByCreationdate(string $creationDate) Return ChildCoupons objects filtered by the creationDate column
 * @method     ChildCoupons[]|ObjectCollection findByEditiondate(string $editionDate) Return ChildCoupons objects filtered by the editionDate column
 * @method     ChildCoupons[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class CouponsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \TAT\Backend\Base\CouponsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\TAT\\Backend\\Coupons', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCouponsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCouponsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildCouponsQuery) {
            return $criteria;
        }
        $query = new ChildCouponsQuery();
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
     * @return ChildCoupons|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CouponsTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = CouponsTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildCoupons A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, title, detail, picURL, status, creationDate, editionDate FROM coupons WHERE id = :p0';
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
            /** @var ChildCoupons $obj */
            $obj = new ChildCoupons();
            $obj->hydrate($row);
            CouponsTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildCoupons|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildCouponsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CouponsTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildCouponsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CouponsTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildCouponsQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(CouponsTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(CouponsTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CouponsTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the title column
     *
     * Example usage:
     * <code>
     * $query->filterByTitle('fooValue');   // WHERE title = 'fooValue'
     * $query->filterByTitle('%fooValue%'); // WHERE title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $title The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCouponsQuery The current query, for fluid interface
     */
    public function filterByTitle($title = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($title)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CouponsTableMap::COL_TITLE, $title, $comparison);
    }

    /**
     * Filter the query on the detail column
     *
     * Example usage:
     * <code>
     * $query->filterByDetail('fooValue');   // WHERE detail = 'fooValue'
     * $query->filterByDetail('%fooValue%'); // WHERE detail LIKE '%fooValue%'
     * </code>
     *
     * @param     string $detail The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCouponsQuery The current query, for fluid interface
     */
    public function filterByDetail($detail = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($detail)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CouponsTableMap::COL_DETAIL, $detail, $comparison);
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
     * @return $this|ChildCouponsQuery The current query, for fluid interface
     */
    public function filterByPicurl($picurl = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($picurl)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CouponsTableMap::COL_PICURL, $picurl, $comparison);
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
     * @return $this|ChildCouponsQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (is_array($status)) {
            $useMinMax = false;
            if (isset($status['min'])) {
                $this->addUsingAlias(CouponsTableMap::COL_STATUS, $status['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($status['max'])) {
                $this->addUsingAlias(CouponsTableMap::COL_STATUS, $status['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CouponsTableMap::COL_STATUS, $status, $comparison);
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
     * @return $this|ChildCouponsQuery The current query, for fluid interface
     */
    public function filterByCreationdate($creationdate = null, $comparison = null)
    {
        if (is_array($creationdate)) {
            $useMinMax = false;
            if (isset($creationdate['min'])) {
                $this->addUsingAlias(CouponsTableMap::COL_CREATIONDATE, $creationdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($creationdate['max'])) {
                $this->addUsingAlias(CouponsTableMap::COL_CREATIONDATE, $creationdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CouponsTableMap::COL_CREATIONDATE, $creationdate, $comparison);
    }

    /**
     * Filter the query on the editionDate column
     *
     * Example usage:
     * <code>
     * $query->filterByEditiondate('2011-03-14'); // WHERE editionDate = '2011-03-14'
     * $query->filterByEditiondate('now'); // WHERE editionDate = '2011-03-14'
     * $query->filterByEditiondate(array('max' => 'yesterday')); // WHERE editionDate > '2011-03-13'
     * </code>
     *
     * @param     mixed $editiondate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCouponsQuery The current query, for fluid interface
     */
    public function filterByEditiondate($editiondate = null, $comparison = null)
    {
        if (is_array($editiondate)) {
            $useMinMax = false;
            if (isset($editiondate['min'])) {
                $this->addUsingAlias(CouponsTableMap::COL_EDITIONDATE, $editiondate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($editiondate['max'])) {
                $this->addUsingAlias(CouponsTableMap::COL_EDITIONDATE, $editiondate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CouponsTableMap::COL_EDITIONDATE, $editiondate, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildCoupons $coupons Object to remove from the list of results
     *
     * @return $this|ChildCouponsQuery The current query, for fluid interface
     */
    public function prune($coupons = null)
    {
        if ($coupons) {
            $this->addUsingAlias(CouponsTableMap::COL_ID, $coupons->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the coupons table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CouponsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CouponsTableMap::clearInstancePool();
            CouponsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(CouponsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CouponsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            CouponsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CouponsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // CouponsQuery
